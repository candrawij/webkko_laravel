@if ($paginator->hasPages())
    <nav class="d-flex flex-column align-items-center gap-1 my-3">

        {{-- Info halaman --}}
        <p class="small text-muted mb-1">
            Menampilkan <span class="fw-semibold text-dark">{{ $paginator->firstItem() }}</span>
            &ndash;
            <span class="fw-semibold text-dark">{{ $paginator->lastItem() }}</span>
            dari <span class="fw-semibold text-dark">{{ $paginator->total() }}</span> data
        </p>

        {{-- Tombol halaman --}}
        <ul class="pagination pagination-sm mb-0">

            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-danger border-danger">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link text-danger" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Berikutnya --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&rsaquo;</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
