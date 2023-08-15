<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSettings extends Settings implements HasMedia
{
    use InteractsWithMedia;

    public ?string $name;

    public ?string $logo;

    public static function group(): string
    {
        return 'site-group';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->useDisk('s3');
    }
}
