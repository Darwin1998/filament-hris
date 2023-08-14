<?php

namespace App\Filament\Admin\Resources\EmployeeResource\Pages;

use App\Filament\Admin\Resources\EmployeeResource;
use Domain\Employee\DataTransferObjects\EmployeeData;
use Domain\Employees\Actions\CreateEmployeeAction;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(
            fn() => app(CreateEmployeeAction::class)->execute(EmployeeData::fromArray($data))
        );
    }
}
