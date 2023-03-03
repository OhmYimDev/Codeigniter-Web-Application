<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('category_model');
        $this->load->model('comment_model');
        $this->load->helper('text');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }

    // This method will show the blog page
    public function index($page = 1)
    {
        // Pagination Config
        $perpage = 5;
        $param['offset'] = $perpage;
        $param['limit'] = ($page * $perpage) - $perpage;
        // $param['q'] = $this->input->get('q');

        // Pagination config
        $config['base_url'] = base_url('blog/index');
        $config['total_rows'] = $this->article_model->getArticleCountFront();
        $config['per_page'] = $perpage;
        $config['use_page_numbers'] = true;

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class'page-item'>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li class'page-item rounded-start'>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li class'page-item'>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class'page-item'>";
        $config['last_tag_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        // Get Articles from Article model
        $data['articles'] = $this->article_model->getArticleFront($param);
        $this->load->view('front/blog', $data);
    }

    public function categories()
    {
        $data['categories'] = $this->category_model->getCategoryFront();
        $this->load->view('front/categories', $data);
    }

    public function detail($article_id)
    {
        $article = $this->article_model->getArticle($article_id);

        if (empty($article)) {
            redirect('blog');
        }

        $data['article'] = $article;

        $data['comments'] = $this->comment_model->getComments($article_id);

        // Form validaiton
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('comment', 'Comment', 'required|min_length[5]');
        $this->form_validation->set_error_delimiters('<p class="mb-0">', '</p>');

        if ($this->form_validation->run()  == true) {
            // Insert here
            $formArray['name'] = $this->input->post('name');
            $formArray['comment'] = $this->input->post('comment');
            $formArray['article_id'] = $article_id;
            $formArray['created_at'] = date('Y-m-d H:i:s');
            $this->comment_model->create($formArray);

            $this->session->set_flashdata('message', 'Your comment has been posted successfully');
            redirect('blog/detail/' . $article_id . '#comment-box');
        } else {
            $this->load->view('front/detail', $data);
        }
    }

    public function category($category_id, $page = 1)
    {

        // Pagination Config
        $perpage = 5;
        $param['offset'] = $perpage;
        $param['limit'] = ($page * $perpage) - $perpage;
        $param['category_id'] = $category_id;

        $category = $this->category_model->getCategory($category_id);
        $articles = $this->article_model->getArticleFront($param);
        if (empty($articles) || empty($category)) {
            redirect('blog');
        }

        // Pagination config
        $config['base_url'] = base_url('blog/category/' . $category_id);
        $config['total_rows'] = $this->article_model->getArticleCountFront($param);
        $config['uri_segment'] = 4;
        $config['per_page'] = $perpage;
        $config['use_page_numbers'] = true;

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = "<ul class='pagination '>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class'page-item rounded-end'>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li class'page-item rounded-start'>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li class'page-item '>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class'page-item'>";
        $config['last_tag_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['category'] = $category;
        // Get Articles from Article model
        $data['articles'] = $articles;
        $this->load->view('front/category_articles', $data);
    }
}
