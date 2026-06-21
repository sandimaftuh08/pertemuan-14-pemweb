
 
<?php $__env->startSection('title', 'Daftar Buku'); ?>
 
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>
    <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Buku
    </a>
</div>

<h1>
    
<div class="card mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('buku.search')); ?>" method="GET">
            <div class="row g-2">
                
                <div class="col-md-4">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari judul, pengarang, penerbit..."
                           value="<?php echo e(request('keyword')); ?>">
                </div>

                
                <div class="col-md-2">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <?php $__currentLoopData = ['Programming','Database','Web Design','Networking','Data Science']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kat); ?>" <?php echo e(request('kategori') == $kat ? 'selected' : ''); ?>>
                                <?php echo e($kat); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="col-md-2">
                    <select name="tahun" class="form-select">
                        <option value="">Semua Tahun</option>
                        <?php if(isset($daftarTahun)): ?>
                            <?php $__currentLoopData = $daftarTahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tahun); ?>" <?php echo e(request('tahun') == $tahun ? 'selected' : ''); ?>>
                                    <?php echo e($tahun); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                
                <div class="col-md-2">
                    <select name="ketersediaan" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="tersedia" <?php echo e(request('ketersediaan') == 'tersedia' ? 'selected' : ''); ?>>
                            Tersedia
                        </option>
                        <option value="habis" <?php echo e(request('ketersediaan') == 'habis' ? 'selected' : ''); ?>>
                            Habis
                        </option>
                    </select>
                </div>

                
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">
                        <i class="bi bi-search"></i> Cari
                    </button>
                    <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-outline-secondary flex-fill">
                        <i class="bi bi-x"></i> Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
</h1>
 

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h2 class="mb-0"><?php echo e($totalBuku); ?></h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Tersedia</h6>
                        <h2 class="mb-0"><?php echo e($bukuTersedia); ?></h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Habis</h6>
                        <h2 class="mb-0"><?php echo e($bukuHabis); ?></h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title">
            <i class="bi bi-funnel"></i> Filter Kategori:
        </h6>
        <div class="btn-group" role="group">
            <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-sm <?php echo e(!isset($kategori) ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Semua
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Programming')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Programming' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Programming
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Database')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Database' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Database
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Web Design')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Web Design' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Web Design
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Networking')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Networking' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Networking
            </a>
            <a href="<?php echo e(route('buku.kategori', 'Data Science')); ?>" class="btn btn-sm <?php echo e(isset($kategori) && $kategori == 'Data Science' ? 'btn-primary' : 'btn-outline-primary'); ?>">
                Data Science
            </a>
        </div>
    </div>
</div>
 

<?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-center">
                    <i class="bi bi-book text-primary" style="font-size: 4rem;"></i>
                    <div class="mt-2">
                        <span class="badge bg-<?php echo e($buku->kategori == 'Programming' ? 'primary' : ($buku->kategori == 'Database' ? 'success' : ($buku->kategori == 'Web Design' ? 'info' : ($buku->kategori == 'Networking' ? 'warning' : 'danger')))); ?>">
                            <?php echo e($buku->kategori); ?>

                        </span>
                    </div>
                </div>
                
                <div class="col-md-7">
                    <h5 class="card-title">
                        <a href="<?php echo e(route('buku.show', $buku->id)); ?>" class="text-decoration-none">
                            <?php echo e($buku->judul); ?>

                        </a>
                    </h5>
                    
                    <p class="card-text text-muted mb-2">
                        <i class="bi bi-person"></i> <?php echo e($buku->pengarang); ?> | 
                        <i class="bi bi-building"></i> <?php echo e($buku->penerbit); ?> | 
                        <i class="bi bi-calendar"></i> <?php echo e($buku->tahun_terbit); ?>

                    </p>
                    
                    <?php if($buku->isbn): ?>
                        <p class="card-text small text-muted mb-1">
                            <i class="bi bi-upc"></i> ISBN: <?php echo e($buku->isbn); ?>

                        </p>
                    <?php endif; ?>
                    
                    <?php if($buku->deskripsi): ?>
                        <p class="card-text">
                            <?php echo e(Str::limit($buku->deskripsi, 150)); ?>

                        </p>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-3 text-end">
                    <h4 class="text-primary mb-2">
                        <?php echo e($buku->harga_format); ?>

                    </h4>
                    
                    <div class="mb-3">
                        <?php if($buku->stok > 0): ?>
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Tersedia
                            </span>
                            <div class="text-muted small mt-1">
                                Stok: <?php echo e($buku->stok); ?> buku
                            </div>
                        <?php else: ?>
                            <span class="badge bg-danger">
                                <i class="bi bi-x-circle"></i> Habis
                            </span>
                        <?php endif; ?>
                    </div>
                    
    <div class="btn-group-vertical d-grid gap-2">
    <a href="<?php echo e(route('buku.show', $buku->id)); ?>" class="btn btn-sm btn-info text-white">
        <i class="bi bi-eye"></i> Detail
    </a>
    <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil"></i> Edit
    </a>
    
    
    <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>" 
      method="POST" 
      class="d-inline delete-form">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>

    <button type="button"
            class="btn btn-sm btn-danger w-100 btn-delete"
            data-judul="<?php echo e($buku->judul); ?>">
        <i class="bi bi-trash"></i> Hapus
    </button>
</form>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i>
        Tidak ada data buku
        <?php if(isset($kategori)): ?>
            dengan kategori <strong><?php echo e($kategori); ?></strong>
        <?php endif; ?>
    </div>
<?php endif; ?>
 
<?php if($bukus->count() > 0): ?>
    <div class="text-center mt-4">
        <p class="text-muted">
            Menampilkan <?php echo e($bukus->count()); ?> buku
            <?php if(isset($kategori)): ?>
                dari kategori <strong><?php echo e($kategori); ?></strong>
            <?php endif; ?>
        </p>
    </div>
<?php endif; ?>
<?php $__env->startPush('scripts'); ?>
<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {

        const form = this.closest('form');
        const judul = this.getAttribute('data-judul');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    // Loading state saat submit form
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !this.classList.contains('delete-form')) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\perpustakaan\resources\views/buku/index.blade.php ENDPATH**/ ?>