<?php
class Proyek extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM proyek ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM proyek WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getPekerjaByProyek($proyekId) {
        $stmt = $this->db->prepare("
            SELECT p.*, pp.status_keaktifan, pp.tanggal_mulai, pp.tanggal_selesai, pp.upah_harian 
            FROM proyek_pekerja pp 
            JOIN pekerja p ON pp.pekerja_id = p.id 
            WHERE pp.proyek_id = ?
        ");
        $stmt->execute([$proyekId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
