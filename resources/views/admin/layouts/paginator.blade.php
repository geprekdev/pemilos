@if ($paginator->hasPages())
  <nav role="Page navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700 dark:text-gray-400 leading-5">
          <span class="font-medium">{{ __('Showing') }}</span>
          {{ $paginator->firstItem() }}
          <span class="font-medium">{{ __('to') }}</span>
          {{ $paginator->lastItem() }}
          <span class="font-medium">{{ __('of') }}</span>
          {{ $paginator->total() }}
          <span class="font-medium">{{ __('results') }}</span>
        </p>
      </div>

      <div class="flex items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
          <span
            class="rounded-l rounded-sm border border-brand-light px-3 py-2 cursor-not-allowed no-underline">&laquo;</span>
        @else
          <a class="rounded-l rounded-sm border-t border-b border-l border-brand-light px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
            href="{{ $paginator->previousPageUrl() }}" rel="prev">
            &laquo;
          </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <span
              class="border-t border-b border-l border-brand-light px-3 py-2 cursor-not-allowed no-underline">{{ $element }}</span>
          @endif

          {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                <span
                  class="border-t border-b border-l border-brand-light px-3 py-2 bg-brand-light no-underline">{{ $page }}</span>
              @else
                <a class="border-t border-b border-l border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline"
                  href="{{ $url }}">{{ $page }}</a>
              @endif
            @endforeach
          @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <a class="rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline"
            href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
          <span
            class="rounded-r rounded-sm border border-brand-light px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed">&raquo;</span>
        @endif
      </div>
    </div>
  </nav>
@endif
