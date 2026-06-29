<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Pekerja</h5>
                <p class="card-text display-4"><?php echo $total_pekerja ?? 0; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Proyek</h5>
                <p class="card-text display-4"><?php echo $total_proyek ?? 0; ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Proyek Aktif</h5>
                <p class="card-text display-4"><?php echo $total_proyek ?? 0; ?></p>
            </div>
        </div>
    </div>
</div>
