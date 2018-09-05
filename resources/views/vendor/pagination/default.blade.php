@if ($paginator->hasPages())
    <ul class="flex list-reset m-4" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="text-blue hover:text-blue-darker" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker p-1 mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="3.828 9 9.899 2.929 8.485 1.515 0 10 .707 10.707 8.485 18.485 9.899 17.071 3.828 11 20 11 20 9 3.828 9"/></svg>
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker p-1 mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="3.828 9 9.899 2.929 8.485 1.515 0 10 .707 10.707 8.485 18.485 9.899 17.071 3.828 11 20 11 20 9 3.828 9"/></svg>
                    </span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="text-blue hover:text-blue-darker" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker text-center no-underline mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker text-center no-underline mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="text-blue hover:text-blue-darker m-2" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker p-1 mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"/></svg>
                    </span>
                </a>
            </li>
        @else
            <li class="text-blue hover:text-blue-darker" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="h-6 w-6 fill-current text-blue-darker rounded inline-block shadow-md border-b border-blue-darker p-1 mr-2 hover:text-blue-dark hover:shadow-none hover:border-blue-dark" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"/></svg>
                </span>
                
            </li>
        @endif
    </ul>
@endif
