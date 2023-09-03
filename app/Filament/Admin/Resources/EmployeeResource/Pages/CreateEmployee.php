<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Pages;

use App\Filament\Admin\Resources\EmployeeResource;
use Domain\Employee\Actions\CreateEmployeeAction;
use Domain\Employee\DataTransferObjects\EmployeeData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected static bool $canCreateAnother = false;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(
            fn () => app(CreateEmployeeAction::class)->execute(EmployeeData::fromArray($data))
        );
    }
}
