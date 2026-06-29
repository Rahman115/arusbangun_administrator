<?php
class Pekerja extends Model {
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM pekerja ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM pekerja WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($data) {
        $sql = "INSERT INTO pekerja (nama_lengkap, panggilan, jabatan, klasifikasi, spesifikasi, no_hp, level) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_lengkap'],
            $data['panggilan'],
            $data['jabatan'],
            $data['klasifikasi'],
            $data['spesifikasi'],
            $data['no_hp'],
            $data['level']
        ]);
    }
    
    public function update($id, $data) {
        $sql = "UPDATE pekerja SET nama_lengkap=?, panggilan=?, jabatan=?, klasifikasi=?, 
                spesifikasi=?, no_hp=?, level=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_lengkap'],
            $data['panggilan'],
            $data['jabatan'],
            $data['klasifikasi'],
            $data['spesifikasi'],
            $data['no_hp'],
            $data['level'],
            $id
        ]);
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM pekerja WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
