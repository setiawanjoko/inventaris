<?php

namespace App\Http\Livewire;

use App\Models\Inventaris;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class InventarisTable extends DataTableComponent
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
            Column::make('Kode', 'code')->sortable()->searchable(),
            Column::make('Nama', 'name')->sortable()->searchable(),
            Column::make('Kondisi', 'condition')->sortable()->searchable(),
            Column::make('Jumlah', 'amount'),
            Column::make('Tindakan', 'id')->format(function($value){
                return view('components.tables.action', [
                    'recordId' => $value,
                    'model' => 'App\Models\Inventaris',
                    'route' => 'inventaris'
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
        return Inventaris::query();
    }
}
