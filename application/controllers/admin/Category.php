<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $admin = $this->session->userdata('admin');

        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expried.');
            redirect('admin/login');
        }

        $this->load->model('Category_model');
        $this->load->helper('common_helper');
    }

    public function index()
    {
        $queryString = $this->input->get('q');
        $params['queryString'] = $queryString;
        $categories = $this->Category_model->getCategories($params);
        $data['categories'] = $categories;
        $data['queryString'] = $queryString;

        // For active menu
        $data['mainModule'] = 'category';
        $data['subModule'] = 'viewCategory';

        $this->load->view('admin/category/list', $data);
    }

    public function create()
    {
        // For active menu
        $data['mainModule'] = 'category';
        $data['subModule'] = 'createCategory';

        $config['upload_path'] = './public/uploads/category/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        // Form validation
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            if (!empty($_FILES['image']['name'])) {

                // Now user has selected a file so we will proceed
                if ($this->upload->do_upload('image')) {
                    // File updated successfully
                    $data = $this->upload->data();

                    // Resizine part
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);

                    // will save category in database
                    $formArray['image'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['created_at'] = date('Y-m-d H:i:s');
                    $this->Category_model->create($formArray);

                    // Create success session
                    $this->session->set_flashdata('success', 'Category has been added successfully.');

                    redirect('admin/category');
                } else {

                    // We got some error
                    $error = $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
                    $data['errorImageUpload'] = $error;
                    $this->load->view('admin/category/create', $data);
                }
            } else {

                // will save category in database
                $formArray['name'] = $this->input->post('name');
                $formArray['status'] = $this->input->post('status');
                $formArray['created_at'] = date('Y-m-d H:i:s');

                $this->Category_model->create($formArray);

                $this->session->set_flashdata('success', 'Category has been added successfully.');
                redirect('admin/category');
            }
        } else {
            // will show errors

            $this->load->view('admin/category/create', $data);
        }
    }

    public function edit($id)
    {
        // For active menu
        $data['mainModule'] = 'category';
        $data['subModule'] = '';

        $category = $this->Category_model->getCategory($id);
        if (empty($category)) {
            $this->session->set_flashdata('error', 'Category not found');
            redirect('admin/category/index');
        }

        // Set config for upload image
        $config['upload_path'] = './public/uploads/category/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        // Form validation
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            if (!empty($_FILES['image']['name'])) {

                // Now user has selected a file so we will proceed
                if ($this->upload->do_upload('image')) {
                    // File updated successfully
                    $data = $this->upload->data();

                    //Resizine part
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 300, 270);

                    // will save category in database
                    $formArray['image'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('name');
                    $formArray['status'] = $this->input->post('status');
                    $formArray['updated_at'] = date('Y-m-d H:i:s');

                    $this->Category_model->update($id, $formArray);

                    if (file_exists('./public/uploads/category/' . $category['image'])) {
                        unlink('./public/uploads/category/' . $category['image']);
                    }

                    // Create success session
                    $this->session->set_flashdata('success', 'Category has been updated successfully.');
                    redirect('admin/category');
                } else {

                    // We got some error
                    $error = $this->upload->display_errors('<p class="invalid-feedback">', '</p>');
                    $data['errorImageUpload'] = $error;
                    $data['category'] = $category;
                    $this->load->view('admin/category/edit', $data);
                }
            } else {

                // will save category in database
                $formArray['name'] = $this->input->post('name');
                $formArray['status'] = $this->input->post('status');
                $formArray['updated_at'] = date('Y-m-d H:i:s');

                $this->Category_model->update($id, $formArray);

                $this->session->set_flashdata('success', 'Category has been updated successfully.');
                redirect('admin/category');
            }
        } else {
            $data['category'] = $category;
            $this->load->view('admin/category/edit', $data);
        }
    }

    // This method will delete a category
    public function delete($id)
    {
        $category = $this->Category_model->getCategory($id);
        if (empty($category)) {
            $this->session->set_flashdata('error', 'Category not found');
            redirect('admin/category/index');
        }

        if (file_exists('./public/uploads/category/' . $category['image'])) {
            unlink('./public/uploads/category/' . $category['image']);
        }

        $this->Category_model->delete($id);
        $this->session->set_flashdata('success', 'Category has been deleted successfully.');
        redirect('admin/category');
    }
    // ---------------------------------------------------------------------------------------------

    // 
}
