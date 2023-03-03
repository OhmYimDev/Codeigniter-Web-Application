<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $admin = $this->session->userdata('admin');

        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expried.');
            redirect('admin/login');
        }

        // Models
        $this->load->model('category_model');
        $this->load->model('article_model');

        // Helper
        $this->load->helper('common_helper');

        // Librarys
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index($page = 1)
    {
        $perpage = 5;
        $param['offset'] = $perpage;
        $param['limit'] = ($page * $perpage) - $perpage;
        $param['q'] = $this->input->get('q');

        // Pagination config
        $config['base_url'] = base_url('admin/article/index');
        $config['total_rows'] = $this->article_model->getArticleCount($param);
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
        $config['prev_tag_open'] = "<li class'page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li class'page-item'>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li class'page-item'>";
        $config['last_tag_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        // Get list articles
        $data['q'] = $this->input->get('q');
        $data['page'] = $page;
        $data['articles'] = $this->article_model->getArticles($param);

        // For active menu
        $data['mainModule'] = 'article';
        $data['subModule'] = 'viewArticle';

        // This view save page number use for after edit article then redirect to current pagination page.
        $this->session->set_userdata('article_page', $page);

        $this->load->view('admin/article/list', $data);
    }

    public function create()
    {
        $data['categories'] = $this->category_model->getCategories();

        // For active menu
        $data['mainModule'] = 'article';
        $data['subModule'] = 'createArticle';

        // Filee upload settings
        $config['upload_path'] = './public/uploads/articles/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['encrypt_name'] = true;
        $config['quality'] = '100%';

        $this->load->library('upload', $config);

        // Form validation
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // Form validated successfully

            if (!empty($_FILES['image']['name'])) {
                // Here will save image
                if ($this->upload->do_upload('image')) {
                    // Image successfully uploaded here
                    $data = $this->upload->data();

                    // Resize image part
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1120, 800);
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);

                    $formArray['image'] = $data['file_name'];
                    $formArray['title'] = $this->input->post('title');
                    $formArray['description'] = $this->input->post('description');
                    $formArray['author'] = $this->input->post('author');
                    $formArray['category'] = $this->input->post('category_id');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['create_at'] = date('Y-m-d H:i:s');

                    $this->article_model->addArticle($formArray);

                    $this->session->set_flashdata('success', 'Article has been added seccessfully');
                    redirect('admin/article');
                } else {
                    // Image selected has some error
                    $data['imageError'] = $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
                    $this->load->view('admin/article/create', $data);
                }
            } else {
                // Here will save article without image
                $formArray['title'] = $this->input->post('title');
                $formArray['description'] = $this->input->post('description');
                $formArray['author'] = $this->input->post('author');
                $formArray['category'] = $this->input->post('category_id');
                $formArray['status'] = $this->input->post('status');
                $formArray['create_at'] = date('Y-m-d H:i:s');

                $this->article_model->addArticle($formArray);

                $this->session->set_flashdata('success', 'Article has been added seccessfully');
                redirect('admin/article');
            }
        } else {
            // Form not validated 
            $this->load->view('admin/article/create', $data);
        }
    }

    public function edit($id)
    {
        // For active menu
        $data['mainModule'] = 'article';
        $data['subModule'] = '';
        $page = $this->session->userdata('article_page');

        $article = $this->article_model->getArticle($id);

        if (empty($article)) {
            // Article not found
            $this->session->set_flashdata('error', 'Artisle not found');
            redirect('admin/article');
        }

        $data['categories'] = $this->category_model->getCategories();
        $data['article'] = $article;

        // Filee upload settings
        $config['upload_path'] = './public/uploads/articles/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['encrypt_name'] = true;
        $config['quality'] = '100%';

        $this->load->library('upload', $config);

        // Form validation
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // Form validated successfully
            if (!empty($_FILES['image']['name'])) {
                // Here will save image
                if ($this->upload->do_upload('image')) {
                    // Image successfully uploaded here
                    $data = $this->upload->data();

                    $path = './public/uploads/articles/thumb_admin/' . $article['image'];
                    if (!empty($article['image']) && file_exists($path)) {
                        unlink($path); // This method  will remove old image in thumb_admin folder
                    }

                    $path = './public/uploads/articles/thumb_front/' . $article['image'];
                    if (!empty($article['image']) && file_exists($path)) {
                        unlink($path); // This method  will remove old image in thumb_front folder
                    }

                    $path = './public/uploads/articles/' . $article['image'];
                    if (!empty($article['image']) && file_exists($path)) {
                        unlink($path); // This method  will remove old image in articles folder
                    }

                    // Resize image part
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1120, 800);
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);

                    $formArray['image'] = $data['file_name'];
                    $formArray['title'] = $this->input->post('title');
                    $formArray['description'] = $this->input->post('description');
                    $formArray['author'] = $this->input->post('author');
                    $formArray['category'] = $this->input->post('category_id');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['update_at'] = date('Y-m-d H:i:s');

                    $this->article_model->updateArticle($id, $formArray);

                    $this->session->set_flashdata('success', 'Article has been updated seccessfully');
                    redirect('admin/article/index/' . $page);
                } else {
                    // Image selected has some error
                    $data['imageError'] = $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
                    $this->load->view('admin/article/edit', $data);
                }
            } else {
                // Here will save article without image
                $formArray['title'] = $this->input->post('title');
                $formArray['description'] = $this->input->post('description');
                $formArray['author'] = $this->input->post('author');
                $formArray['category'] = $this->input->post('category_id');
                $formArray['status'] = $this->input->post('status');
                $formArray['update_at'] = date('Y-m-d H:i:s');

                $this->article_model->updateArticle($id, $formArray);

                $this->session->set_flashdata('success', 'Article has been updated seccessfully');
                // $page = $this->session->userdata('page');
                redirect('admin/article/index/' . $page);
            }
        } else {
            // Form not validated 
            $this->load->view('admin/article/edit', $data);
        }
    }

    public function delete($id)
    {
        $article = $this->article_model->findArticle($id);

        if (empty($article)) {
            // Article not found
            $this->session->set_flashdata('error', 'Artisle not found');
            redirect('admin/article');
        }

        $path = './public/uploads/articles/thumb_admin/' . $article['image'];
        if (!empty($article['image']) && file_exists($path)) {
            unlink($path); // This method  will remove old image in thumb_admin folder
        }

        $path = './public/uploads/articles/thumb_front/' . $article['image'];
        if (!empty($article['image']) && file_exists($path)) {
            unlink($path); // This method  will remove old image in thumb_front folder
        }

        $path = './public/uploads/articles/' . $article['image'];
        if (!empty($article['image']) && file_exists($path)) {
            unlink($path); // This method  will remove old image in articles folder
        }

        $this->article_model->deleteArticle($id); // Thsi will delete article

        $this->session->set_flashdata('success', 'Article has been deleted seccessfully');
        redirect('admin/article');
    }
}
