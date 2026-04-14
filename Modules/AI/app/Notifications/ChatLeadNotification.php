<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Notifications;

use App\Models\ContactMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Core\Notifications\TemplatedNotification;

class ChatLeadNotification extends TemplatedNotification
{
    public function __construct(
        protected ContactMessage $contactMessage
    ) {}

    protected function getTemplateSlug(): string
    {
        return 'ai_chat_lead';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'contact' => [
                'name' => $this->contactMessage->name,
                'email' => $this->contactMessage->email,
                'subject' => $this->contactMessage->subject,
                'message' => $this->contactMessage->message,
            ],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('Nouveau lead via le chatbot'))
            ->greeting(__('Nouveau lead reçu !'))
            ->line(__('**Nom :** :name', ['name' => $this->contactMessage->name]))
            ->line(__('**Courriel :** :email', ['email' => $this->contactMessage->email]))
            ->line(__('**Sujet :** :subject', ['subject' => $this->contactMessage->subject]))
            ->line(__('**Message :** :message', ['message' => $this->contactMessage->message]))
            ->action(__('Voir dans le backoffice'), url('/admin/contact-messages'))
            ->salutation(__("L'équipe :app", ['app' => config('app.name')]));
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'chat_lead',
            'message' => 'Nouveau lead chatbot de '.$this->contactMessage->name,
            'contact_message_id' => $this->contactMessage->id,
        ];
    }
}
