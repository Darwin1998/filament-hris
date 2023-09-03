<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EmployeeResource\Pages;
use Domain\Employee\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'full_name';

    protected static bool $shouldSkipAuthorization = true;

    public static function getNavigationGroup(): ?string
    {
        return trans('Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->email(),

                        TextInput::make('phone')
                            ->unique(ignoreRecord: true)
                            ->required(),

                        TextInput::make('address')
                            ->required(),

                        DatePicker::make('birth_date')
                            ->required(),

                        TextInput::make('password')
                            ->password()
                            ->required(),

                        Select::make('role')
                            ->required()
                            ->options([
                                'developer' => 'Developer',
                                'manager' => 'Manager',
                                'designer' => 'Designer',
                            ]),

                        SpatieMediaLibraryFileUpload::make('profile_picture')
                            ->disk('s3')
                            ->downloadable()
                            ->image()
                            ->collection('profile_picture'),

                        SpatieMediaLibraryFileUpload::make('documents')
                            ->multiple()
                            ->downloadable()
                            ->disk('s3')
                            ->openable()
                            ->collection('documents'),

                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('profile_picture')
                    ->circular()
                    ->collection('profile_picture'),
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
