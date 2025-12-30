@extends('admin.tempdash')
@section('content')

<section class="container-fluid bg-light" style="min-height: 100vh;">
    <div class="container py-5">

        {{-- SEARCH --}}
        <form method="GET" class="d-flex gap-2 mb-3">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari nama atau email..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </form>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- FORM HAPUS BANYAK --}}
        <form method="POST" action="{{ route('admin.kontak.hapus.banyak') }}">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <button class="btn btn-danger">
                    <i class="fa fa-trash"></i> Hapus Terpilih
                </button>
            </div>

            @forelse($kontaks as $kontak)
            <div class="card shadow-sm mb-3">
                <div class="card-body d-flex align-items-center gap-3">

                    <input type="checkbox" name="ids[]" value="{{ $kontak->id }}">

                    {{-- BUKA MODAL --}}
                    <a href="#"
                       class="btn flex-grow-1 text-start p-0 border-0 bg-transparent w-100"
                       data-bs-toggle="modal"
                       data-bs-target="#modal{{ $kontak->id }}"
                       onclick="event.preventDefault(); tandaiDibaca({{ $kontak->id }})">

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $kontak->name }}</h5>
                                <small class="text-muted">{{ $kontak->email }}</small>
                            </div>

                            {{-- BADGE STATUS (RAPI) --}}
                            <span class="status-badge
                                {{ $kontak->is_read ? 'status-read' : 'status-unread' }}">
                                {{ $kontak->is_read ? 'Dibaca' : 'Belum Dibaca' }}
                            </span>
                        </div>
                    </a>

                    {{-- HAPUS SATU --}}
                    <form action="{{ route('admin.kontak.hapus', $kontak->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- MODAL --}}
            <div class="modal fade" id="modal{{ $kontak->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>{{ $kontak->subject }}</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $kontak->message }}</p>
                            <small class="text-muted">{{ $kontak->email }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="alert alert-info">Belum ada pesan</div>
            @endforelse
        </form>

        {{-- FORM PATCH DI LUAR --}}
        @foreach($kontaks as $kontak)
        <form id="dibaca-{{ $kontak->id }}"
              action="{{ route('admin.kontak.dibaca', $kontak->id) }}"
              method="POST" class="d-none">
            @csrf
            @method('PATCH')
        </form>
        @endforeach

    </div>
</section>

{{-- STYLE BADGE --}}
<style>
.status-badge{
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    white-space: nowrap;
}
.status-unread{
    background: #0d6efd;
    color: #fff;
}
.status-read{
    background: #f1f3f5;
    color: #495057;
    border: 1px solid #dee2e6;
}
</style>

<script>
function tandaiDibaca(id) {
    document.getElementById('dibaca-' + id).submit();
}
</script>

@endsection
