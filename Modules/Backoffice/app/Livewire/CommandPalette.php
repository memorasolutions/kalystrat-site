<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Backoffice\Services\NavigationService;

class CommandPalette extends Component
{
    public string $query = '';

    /** @var array<int, array<string, mixed>> */
    public array $results = [];

    public bool $isOpen = false;

    #[On('open-command-palette')]
    public function open(): void
    {
        $this->isOpen = true;
    }

    public function close(): void
    {
        $this->isOpen = false;
        $this->query = '';
        $this->results = [];
    }

    public function updatedQuery(): void
    {
        if (strlen($this->query) < 2) {
            $this->results = [];

            return;
        }

        $nav = app(NavigationService::class);
        $this->results = $nav->search($this->query, auth()->user());
    }

    public function navigate(string $route): void
    {
        $this->close();
        $this->redirect(route($route));
    }

    public function render(): View
    {
        return view('backoffice::livewire.command-palette');
    }
}
