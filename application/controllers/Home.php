<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }
    public function index()
    {
        $param['offset'] = 4;
        $param['limit'] = 0;
        $data['articles'] = $this->article_model->getArticleFront($param);

        $this->load->view('front/home', $data);
    }
}
