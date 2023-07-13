<x-app-layout>
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>
                        @lang('crud.classrooms.index_title')
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        @can('create', App\Models\Classroom::class)
                            <a href="{{ route('classrooms.create') }}" class="btn-shadow button button-primary">
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <form>
                            <div class="flex items-center w-full">
                                <x-inputs.text name="search" value="{{ $search ?? '' }}" placeholder="{{ __('crud.common.search') }}" autocomplete="off"></x-inputs.text>
                                <div class="ml-1">
                                    <button type="submit" class="button button-primary">
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="mb-0 table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.classrooms.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.classrooms.inputs.desc')
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($classrooms as $classroom)
                                <tr class="hover:bg-gray-50">
                                    <th>#</th>
                                    <td class="px-4 py-3 text-left">
                                        {{ $classroom->name ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-left">
                                        {{ $classroom->desc ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="relative inline-flex align-middle">
                                            @can('update', $classroom)
                                                <a href="{{ route('classrooms.edit', $classroom) }}" class="mr-1">
                                                    <button type="button" class="button">
                                                        <i class="icon ion-md-create"></i>
                                                    </button>
                                                </a>
                                            @endcan @can('view', $classroom)
                                                <a href="{{ route('classrooms.show', $classroom) }}" class="mr-1">
                                                    <button type="button" class="button">
                                                        <i class="icon ion-md-eye"></i>
                                                    </button>
                                                </a>
                                            @endcan @can('delete', $classroom)
                                                <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="button">
                                                        <i class="icon ion-md-trash text-red-600"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="mt-6 px-2">
                                        {{ $classrooms->links() }}
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
