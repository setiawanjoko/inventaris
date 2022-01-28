<?php

namespace App\Http\Livewire;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class JenisTable extends DataTableComponent
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
            Column::make('Kode Jenis', 'code')->sortable()->searchable(),
            Column::make('Nama Jenis', 'name')->sortable()->searchable(),
            Column::make('Deskripsi', 'description'),
            Column::make('Tindakan', 'id')->format(function($value){
                return view('components.tables.action', [
                    'recordId' => $value,
                    'model' => 'App\Models\Jenis',
                    'route' => 'jenis'
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
        return Jenis::query();
    }
}
