<?php

namespace App\Filament\Admin\Resources\DepartmentResource\Pages;

use App\Filament\Admin\Resources\DepartmentResource;
use Domain\Department\Actions\CreateDepartmentAction;
use Domain\Department\DataTransferObjects\DepartmentData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateDepartment extends CreateRecord
{
    protected static string $resource = DepartmentResource::class;

    protected static bool $canCreateAnother = false;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(
            fn () => app(CreateDepartmentAction::class)->execute(DepartmentData::fromArray($data))
        );
    }
}
