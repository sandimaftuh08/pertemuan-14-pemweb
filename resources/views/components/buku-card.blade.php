<div class="card h-100">
    <div class="card-body">
        <div class="text-center mb-3">
            <i class="bi bi-book text-primary" style="font-size:3.5rem;"></i>
        </div>

        <span class="badge bg-{{ $buku->kategori == 'Programming' ? 'primary' : ($buku->kategori == 'Database' ? 'success' : ($buku->kategori == 'Web Design' ? 'info' : ($buku->kategori == 'Networking' ? 'warning' : 'danger'))) }} mb-2">
            {{ $buku->kategori }}
        </span>

        <h5 class="card-title">
            {{ Str::limit($buku->judul, 50) }}
        </h5>

        <p class="card-text text-muted small">
            <i class="bi bi-person"></i> {{ $buku->pengarang }}<br>
            <i class="bi bi-building"></i> {{ $buku->penerbit }}
        </p>

        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-bold text-success">{{ $buku->harga_format }}</span>
            @if ($buku->stok > 0)
                <span class="badge bg-success">
                    <i class="bi bi-check-circle"></i> Tersedia ({{ $buku->stok }})
                </span>
            @else
                <span class="badge bg-danger">
                    <i class="bi bi-x-circle"></i> Habis
                </span>
            @endif
        </div>

        @if ($showActions)
        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-info text-white flex-fill">
                <i class="bi bi-eye"></i> Detail
            </a>
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning flex-fill">
                <i class="bi bi-pencil"></i> Edit
            </a>
        </div>
        @endif
    </div>
</div>