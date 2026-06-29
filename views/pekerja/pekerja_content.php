<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Pekerja</h2>
    <a href="/pekerja/create" class="btn btn-primary">Tambah Pekerja</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Klasifikasi</th>
                <th>No HP</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pekerja as $p): ?>
            <tr>
                <td><?php echo $p['id']; ?></td>
                <td><?php echo htmlspecialchars($p['nama_lengkap']); ?></td>
                <td><?php echo htmlspecialchars($p['jabatan']); ?></td>
                <td><?php echo htmlspecialchars($p['klasifikasi']); ?></td>
                <td><?php echo htmlspecialchars($p['no_hp']); ?></td>
                <td><?php echo htmlspecialchars($p['level']); ?></td>
                <td>
                    <a href="/pekerja/edit/<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/pekerja/delete/<?php echo $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
