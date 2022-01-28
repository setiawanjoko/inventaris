<?php

namespace App\Http\Livewire;

use App\Models\Ruang;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RuangTable extends DataTableComponent
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
            Column::make('Kode Ruang', 'code')->sortable()->searchable(),
            Column::make('Nama Ruang', 'name')->sortable()->searchable(),
            Column::make('Deskripsi', 'description'),
            Column::make('Tindakan', 'id')->format(function($value){
                return view('components.tables.action', [
                    'recordId' => $value,
                    'model' => 'App\Models\Ruang',
                    'route' => 'ruang'
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
        return Ruang::query();
    }
}
