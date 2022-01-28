@can('update', $model)
        <a href="{{ route($route . '.edit', $recordId) }}"
           class="px-1 text-sm font-semibold text-cyan-600 hover:text-cyan-700">Sunting</a>
@endcan
@can('delete', $model)
        <button data-id="{{ $recordId }}" onclick="recordDelete(event)"
           class="px-1 ext-sm font-semibold text-rose-600 hover:text-rose-700 recordDelete">Hapus</button>

@endcan
