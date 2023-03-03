<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $admin = $this->session->userdata('admin');
        if (!empty($admin)) {
            redirect('admin/home');
        }

        $this->load->view('admin/login');
        $this->load->library('form_validation');
    }

    public function authenticate()
    {
        $this->load->library('form_validation');
        $this->load->model('admin_model');

        $this->form_validation->set_error_delimiters('<span class="invalid-feedback">', '</span>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $query = $this->admin_model->getByUsername($username);

            if (!empty($query)) {
                $password = $this->input->post('password');

                if (password_verify($password, $query['password'])) {
                    $admin['admin_id'] = $query['id'];
                    $admin['username'] = $query['username'];

                    $this->session->set_userdata('admin', $admin);
                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('msg', 'Password is incorrect');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('msg', 'Username or Password is incorrect');
                redirect('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('admin/login', 'refresh');
    }
}
