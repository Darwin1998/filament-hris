<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSettings extends Settings
{
    public ?string $name;

    public ?string $logo;

    public static function group(): string
    {
        return 'site-group';
    }

}
