<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Newsletter\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Collection;
use Modules\Core\Notifications\TemplatedNotification;

class DigestNotification extends TemplatedNotification
{
    public function __construct(private readonly Collection $articles) {}

    /** @return list<string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    protected function getTemplateSlug(): string
    {
        return 'newsletter_digest';
    }

    protected function getTemplateData(object $notifiable): array
    {
        $locale = app()->getLocale();

        return [
            'user' => ['name' => $notifiable->name ?? '', 'email' => $notifiable->email ?? ''],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'digest' => [
                'count' => $this->articles->count(),
                'articles' => $this->articles->take(5)->map(fn ($article) => [
                    'title' => $article->getTranslation('title', $locale),
                    'url' => route('blog.show', $article->getTranslation('slug', $locale)),
                ])->toArray(),
            ],
            'subscriber' => [
                'token' => $notifiable->token ?? '',
            ],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        $count = $this->articles->count();
        $appName = config('app.name');
        $plural = $count > 1 ? 's' : '';

        $mail = (new MailMessage)
            ->subject(__('Nouveaux articles cette semaine - :app', ['app' => $appName]))
            ->greeting(__('Bonjour,'))
            ->line(__('Voici les nouveaux articles publiés cette semaine sur :app.', ['app' => $appName]))
            ->line(__(':count nouvel(s) article(s) :', ['count' => $count]));

        foreach ($this->articles->take(5) as $article) {
            $locale = app()->getLocale();
            $title = $article->getTranslation('title', $locale);
            $slug = $article->getTranslation('slug', $locale);
            $mail->line("- {$title} : ".route('blog.show', $slug));
        }

        if ($count > 5) {
            $remaining = $count - 5;
            $mail->line(__('... et :count autre(s) article(s).', ['count' => $remaining]));
        }

        $mail->action(__('Lire les articles'), route('blog.index'))
            ->line(__('Pour vous désabonner : :url', ['url' => route('newsletter.unsubscribe', ['token' => $notifiable->token])]));

        return $mail;
    }
}
