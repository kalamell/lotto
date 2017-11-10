<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        $rs = $this->db->where(array(
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'))
        ))->get('member');

        if ($rs->num_rows()>0) {
            return $rs->row();
        }
        return false;
    }

    public function getId($member_id)
    {
        return $this->db->where('member_id', $member_id)->get('member')->row();
    }

    public function updateProfile($member_id)
    {
        if ($this->input->post('password')) {
            $this->db->set('password', do_hash($this->input->post('password')));
        }

        $this->db->where('member_id', $member_id)->update('member', array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
        ));
    }

}
