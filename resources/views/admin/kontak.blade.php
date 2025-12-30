@extends('admin.tempdash')
@section('content')

<section class="container-fluid bg-light" style="min-height:100vh;">
    <div class="container py-5">

        {{-- SEARCH --}}
        <form method="GET" class="d-flex gap-2 mb-3">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari nama atau email..."
                   value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </form>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- ALERT ERROR (WAJIB ADA) --}}
        @if(session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        {{-- FORM HAPUS BANYAK --}}
        <form id="bulkDeleteForm"
              method="POST"
              action="{{ route('admin.kontak.hapus.banyak') }}">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <button type="button"
                        class="btn btn-danger"
                        onclick="submitBulkDelete()">
                    <i class="fa fa-trash"></i> Hapus Terpilih
                </button>
            </div>

            {{-- LIST PESAN --}}
            @forelse($kontaks as $kontak)
                <div class="card shadow-sm mb-3">
                    <div class="card-body d-flex align-items-center gap-3">

                        {{-- CHECKBOX --}}
                        <input type="checkbox"
                               name="ids[]"
                               value="{{ $kontak->id }}">

                        {{-- BUKA MODAL --}}
                        <a href="#"
                           class="btn flex-grow-1 text-start p-0 border-0 bg-transparent"
                           data-bs-toggle="modal"
                           data-bs-target="#modal{{ $kontak->id }}"
                           onclick="tandaiDibaca({{ $kontak->id }})">

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $kontak->name }}</h5>
                                    <small class="text-muted">{{ $kontak->email }}</small>
                                </div>

                                {{-- BADGE STATUS --}}
                                <span id="badge-{{ $kontak->id }}"
                                      class="status-badge {{ $kontak->is_read ? 'status-read' : 'status-unread' }}">
                                    {{ $kontak->is_read ? 'Dibaca' : 'Belum Dibaca' }}
                                </span>
                            </div>
                        </a>

                        {{-- HAPUS SATU --}}
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                onclick="hapusSatu({{ $kontak->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>

                {{-- MODAL PESAN --}}
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
                <div class="alert alert-info">
                    Belum ada pesan
                </div>
            @endforelse
        </form>
    </div>
</section>

{{-- STYLE BADGE --}}
<style>
.status-badge{
    padding: 6px 14px;
    border-radius: 20px;
    font-size: .8rem;
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

{{-- SCRIPT --}}
<script>
/* ===============================
   TANDAI DIBACA (AJAX)
================================ */
function tandaiDibaca(id){
    fetch(`/admin/kontak/${id}/dibaca`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => {
        const badge = document.getElementById('badge-' + id);
        if (badge) {
            badge.classList.remove('status-unread');
            badge.classList.add('status-read');
            badge.innerText = 'Dibaca';
        }
    });
}

/* ===============================
   HAPUS SATU (AJAX)
================================ */
function hapusSatu(id){
    if (!confirm('Hapus pesan ini?')) return;

    fetch(`/admin/kontak/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => location.reload());
}

/* ===============================
   HAPUS BANYAK (SAFE)
================================ */
function submitBulkDelete(){
    const checked = document.querySelectorAll('input[name="ids[]"]:checked');

    if (checked.length === 0) {
        alert('Pilih minimal satu pesan.');
        return;
    }

    if (confirm('Yakin ingin menghapus pesan terpilih?')) {
        document.getElementById('bulkDeleteForm').submit();
    }
}
</script>

@endsection
