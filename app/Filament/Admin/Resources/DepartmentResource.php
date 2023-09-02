<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DepartmentResource\Pages;
use Domain\Department\Models\Department;
use Domain\Employee\Models\Employee;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return trans('Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('New Department')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Select::make('employees')
                            ->multiple()
                            ->searchable()
                            ->required()
                            ->options(Employee::all()->pluck('full_name', 'id')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}