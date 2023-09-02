<?php

namespace App\Filament\Admin\Pages;

use App\Settings\SiteSettings;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageSite extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = SiteSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('logo')
                    ->image()
                    ->disk('s3')
                    ->collection('logo'),

                TextInput::make('name'),

            ]);
    }
}
