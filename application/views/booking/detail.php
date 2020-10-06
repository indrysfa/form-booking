<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Detail Booking Order</h5>
                <div class="card-body">
                    <h5 class="card-title"><?= $booking['nama']; ?></h5>
                    <p class="card-text"><?= $booking['nip']; ?></p>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $booking['email']; ?></h6>
                    <p class="card-text"><?= $booking['jurusan']; ?></p>
                    <a href="<?= base_url(); ?>booking" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>