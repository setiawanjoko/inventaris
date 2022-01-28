<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    public bool $columnSelect = true;

    /**
     * The array defining the columns of the table.
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('NIP', 'nip')->sortable()->searchable(),
            Column::make('Nama', 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Alamat', 'address'),
            Column::make('Tindakan', 'id')->format(function($value){
                return view('components.tables.action', [
                    'recordId' => $value,
                    'model' => 'App\Models\User',
                    'route' => 'user'
                ]);
            })->excludeFromSelectable()
        ];
    }

    /**
     * The base query with search and filters for the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return User::query();
    }
}
