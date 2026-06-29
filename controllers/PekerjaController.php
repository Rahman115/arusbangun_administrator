<?php
class PekerjaController extends Controller {
    private $pekerjaModel;
    
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('auth/login');
        }
        $this->pekerjaModel = new Pekerja();
    }
    
    public function index() {
        $data = [
            'pekerja' => $this->pekerjaModel->getAll(),
            'title' => 'Data Pekerja'
        ];
        $this->view('pekerja/index', $data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->pekerjaModel->create($_POST);
            $this->redirect('pekerja');
        }
        $this->view('pekerja/create', ['title' => 'Tambah Pekerja']);
    }
    
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->pekerjaModel->update($id, $_POST);
            $this->redirect('pekerja');
        }
        $data = [
            'pekerja' => $this->pekerjaModel->getById($id),
            'title' => 'Edit Pekerja'
        ];
        $this->view('pekerja/edit', $data);
    }
    
    public function delete($id) {
        $this->pekerjaModel->delete($id);
        $this->redirect('pekerja');
    }
}
