<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('admin');

        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expried.');
            redirect('admin/login');
        }
    }

    public function index()
    {
        // For active menu
        $data['mainModule'] = 'dashboard';

        $this->load->view('admin/dashboard', $data);
    }
}
