<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function about()
    {
        $this->load->view('front/about');
    }

    public function services()
    {
        $this->load->view('front/services');
    }

    public function contact()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

        if ($this->form_validation->run() == true) {
            // Here will process contact us form
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'phongphandwy@gmail.com',
                'smtp_pass' => 'o57424865',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->to('phongphandwy@gmail.com');
            $this->email->from('example@example.com');
            $this->email->subject('You have received an enquiry');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');

            $message = "Name: " . $name;
            $message .= "<br>";
            $message = "Email: " . $email;
            $message .= "<br>";
            $message = "Message: " . $message;
            $message .= "<br>";
            $message .= "<br>";

            $message .= "Email Example by OhmYim";

            $this->email->message($message);
            $this->email->send();

            $this->session->set_flashdata('msg', 'Thank you for equiry, we will get back to you soon.');
            redirect('page/contact');
        } else {
            $this->load->view('front/contact_us');
        }
    }
}
