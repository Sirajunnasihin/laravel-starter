@if ($paginator->hasPages())
    <div class="row">
        <div class="col-md-9" style="text-align: right;">
            <nav class="" aria-label="{{ __('Pagination Navigation') }}">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item">
                            <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="visually-hidden">{!! __('pagination.previous') !!}</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="visually-hidden">{!! __('pagination.previous') !!}</span>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item"><a href="javascript:void(0);" class="page-link">{{ $element }}</a></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a href="javascript:void(0);" class="page-link">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" class="page-link">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="visually-hidden">{!! __('pagination.next') !!}</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="javascript:void(0);" class="page-link" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="visually-hidden">{!! __('pagination.next') !!}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>

        <div class="col-md-3" style="text-align: left;">
            <p class="text-sm text-gray-700 leading-5">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
    </div>
@endif
