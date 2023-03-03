<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getCategory($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('categories')->row_array();
        return $result;
    }

    public function getCategories($params = [])
    {
        if (!empty($params)) {
            $this->db->like('name', $params['queryString']);
        }
        $data = $this->db->get('categories')->result_array();
        return $data;
    }

    public function create($formArray)
    {
        $this->db->insert('categories', $formArray);
    }

    public function update($id, $formArray)
    {
        $this->db->where('id', $id);
        $this->db->update('categories', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }
    // ------------------------------------------------------------------

    // Front Function
    public function getCategoryFront()
    {
        $this->db->where('status', 1);
        $result = $this->db->get('categories')->result_array();
        return $result;
    }
}
