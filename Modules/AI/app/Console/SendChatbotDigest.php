<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Modules\AI\Enums\MessageRole;
use Modules\AI\Mail\ChatbotDigestMail;
use Modules\AI\Models\AiConversation;
use Modules\Settings\Models\Setting;

class SendChatbotDigest extends Command
{
    protected $signature = 'ai:send-digest {--days=1 : Number of days to look back}';

    protected $description = 'Send daily digest of chatbot conversations to admin';

    public function handle(): int
    {
        $days = (int) $this->option('days');
        $startDate = Carbon::now()->subDays($days);

        $conversations = AiConversation::where('created_at', '>=', $startDate)
            ->whereHas('messages', fn ($q) => $q->where('role', MessageRole::User))
            ->with(['messages' => fn ($q) => $q->orderBy('created_at')])
            ->orderByDesc('created_at')
            ->get();

        if ($conversations->isEmpty()) {
            $this->info("Aucune conversation pour les {$days} derniers jours. Aucun email envoyé.");

            return 0;
        }

        $totalMessages = 0;
        $formattedConversations = [];
        $leadsCount = 0;
        $unresolvedIds = [];
        $titleCounts = [];

        foreach ($conversations as $conversation) {
            $messages = $conversation->messages;
            $totalMessages += $messages->count();

            $userMessages = $messages->filter(fn ($m) => $m->role === MessageRole::User);

            $hasLead = false;
            foreach ($userMessages as $message) {
                if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $message->content)
                    || preg_match('/\b(\+?1[-.\s]?)?\(?[0-9]{3}\)?[-.\s]?[0-9]{3}[-.\s]?[0-9]{4}\b/', $message->content)) {
                    $hasLead = true;
                    break;
                }
            }

            if ($hasLead) {
                $leadsCount++;
            }

            $nonSystemMessages = $messages->filter(fn ($m) => $m->role !== MessageRole::System);
            if ($nonSystemMessages->isNotEmpty() && $nonSystemMessages->last()->role === MessageRole::User) {
                $unresolvedIds[] = $conversation->id;
            }

            $title = $conversation->title ?? 'Conversation sans titre';
            $titleCounts[$title] = ($titleCounts[$title] ?? 0) + 1;

            $exchanges = $messages
                ->filter(fn ($m) => $m->role !== MessageRole::System)
                ->take(6)
                ->map(fn ($m) => [
                    'role' => $m->role === MessageRole::User ? 'Visiteur' : 'Assistant',
                    'content' => $m->content,
                    'created_at' => $m->created_at->format('H:i'),
                ])
                ->values()
                ->toArray();

            $formattedConversations[] = [
                'id' => $conversation->id,
                'title' => $title,
                'user_id' => $conversation->user_id,
                'created_at' => $conversation->created_at->format('Y-m-d H:i'),
                'message_count' => $messages->count(),
                'exchanges' => $exchanges,
            ];
        }

        arsort($titleCounts);
        $topThemes = array_slice($titleCounts, 0, 5, true);

        $stats = [
            'conversations_count' => $conversations->count(),
            'messages_count' => $totalMessages,
            'leads_count' => $leadsCount,
            'unresolved_count' => count($unresolvedIds),
            'unresolved_ids' => $unresolvedIds,
            'top_themes' => $topThemes,
            'period' => $days === 1 ? '24 dernières heures' : "{$days} derniers jours",
            'date_range' => $startDate->format('Y-m-d H:i').' à '.Carbon::now()->format('Y-m-d H:i'),
            'conversations' => $formattedConversations,
        ];

        $adminEmail = Setting::get('ai.admin_email', config('mail.from.address'));

        if (empty($adminEmail)) {
            $this->error('Admin email not configured (ai.admin_email).');

            return 1;
        }

        Mail::to($adminEmail)->send(new ChatbotDigestMail($stats));
        $this->info("Digest envoyé à {$adminEmail} — {$conversations->count()} conversations, {$leadsCount} leads.");

        return 0;
    }
}
