<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_model extends CI_Model
{
    public function getArticle($id)
    {
        $this->db->select('articles.*, categories.name as category_name');
        $this->db->where('articles.id', $id);
        $this->db->join('categories', 'categories.id = articles.category');
        $query = $this->db->get('articles')->row_array();
        return $query;
    }

    public function findArticle($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('articles')->row_array();
        return $result;
    }

    public function getArticles($param = array())
    {
        if (isset($param['offset']) && isset($param['limit'])) {
            $this->db->limit($param['offset'], $param['limit']);
        }

        if (isset($param['q'])) {
            $this->db->or_like('title', trim($param['q']));
            $this->db->or_like('author', trim($param['q']));
        }

        $this->db->order_by('create_at', 'DESC');

        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getArticleCount($param = array())
    {
        if (isset($param['q'])) {
            $this->db->or_like('title', trim($param['q']));
            $this->db->or_like('author', trim($param['q']));
        }

        $count = $this->db->count_all_results('articles');
        return $count;
    }

    public function addArticle($formArray)
    {
        $this->db->insert('articles', $formArray);
        return $this->db->insert_id();
    }

    public function updateArticle($id, $formArray)
    {
        $this->db->where('id', $id);
        $this->db->update('articles', $formArray);
    }

    public function deleteArticle($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('articles');
    }
    // -------------------------------------------------------------------------------------

    // Front Methods
    public function getArticleFront($param = array())
    {
        if (isset($param['offset']) && isset($param['limit'])) {
            $this->db->limit($param['offset'], $param['limit']);
        }

        if (isset($param['q'])) {
            $this->db->or_like('title', trim($param['q']));
            $this->db->or_like('author', trim($param['q']));
        }

        if (isset($param['category_id'])) {
            $this->db->where('category', $param['category_id']);
        }

        $this->db->select('articles.*, categories.name as category_name');
        $this->db->where('articles.status', 1);
        $this->db->order_by('articles.create_at', 'DESC');

        $this->db->join('categories', 'categories.id = articles.category', 'left');


        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getArticleCountFront($param = array())
    {
        if (isset($param['category_id'])) {
            $this->db->where('category', $param['category_id']);
        }

        $this->db->where('status', 1);
        $count = $this->db->count_all_results('articles');

        return $count;
    }
}
