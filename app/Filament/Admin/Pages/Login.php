<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use Filament\Pages\Auth\Login as BasePage;

/**
 * @todo remove this when in real production site
 */
final class Login extends BasePage
{
    public function mount(): void
    {
        parent::mount();

    }
}
