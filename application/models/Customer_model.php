<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    public function __consturct()
    {
        parent::__consturct();
    }
    public function getAll()
    {
        return $this->db->get('customer')->result();
    }

    public function save()
    {
    	$this->db->set('created_date', 'NOW()', false)->insert('customer', array(
    		'name' => $this->input->post('name'),
    		'mobile' => $this->input->post('mobile'),
    	));
    }

    public function getId($id)
    {
        return $this->db->where('id', $id)->get('customer')->row();
    }


    public function update()
    {
        $this->db->where('id', $this->input->post('id'))->update('customer', array(
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
        ));
    }
}