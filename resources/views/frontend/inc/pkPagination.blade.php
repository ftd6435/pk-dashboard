@if($pkPagination->hasPages())
  <div class="col-12">
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-lg justify-content-center m-0">
        {{-- Pagination previous page --}}
        @if ($pkPagination->onFirstPage())
          <li class="page-item disabled">
            <span aria-hidden="true" class="page-link rounded-0">&laquo;</span>
          </li>
        @else
          <li class="page-item">
            <a class="page-link rounded-0" href="{{ $pkPagination->previousPageUrl() }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
        @endif
        {{-- Pagination elements --}}
        @for ($page = 0; $page < $pkPagination->lastPage(); $page++)
          <li class="page-item {{ $pkPagination->currentPage() === ($page+1) ? 'active' : '' }}"><a class="page-link" href="{{ $pkPagination->url($page+1) }}">{{ $page + 1 }}</a></li>
        @endfor
        {{-- Pagination next button --}}
        @if($pkPagination->hasMorePages())
          <li class="page-item">
            <a class="page-link rounded-0" href="{{ $pkPagination->nextPageUrl() }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        @else
          <li class="page-item disabled">
              <span aria-hidden="true" class="page-link rounded-0">&raquo;</span>
          </li>
        @endif
      </ul>
    </nav>
  </div>
@endif