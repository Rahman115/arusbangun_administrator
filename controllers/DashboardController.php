<?php
class DashboardController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('auth/login');
        }
    }
    
    public function index() {
        $pekerjaModel = new Pekerja();
        $proyekModel = new Proyek();
        
        $data = [
            'total_pekerja' => count($pekerjaModel->getAll()),
            'total_proyek' => count($proyekModel->getAll()),
            'title' => 'Dashboard'
        ];
        
        $this->view('dashboard/index', $data);
    }
}
