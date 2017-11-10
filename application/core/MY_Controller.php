<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
    protected $member_id;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');

        if ($this->input->cookie('lotto_data')) {
            $data = $this->input->cookie('lotto_data');
            $id = $this->encrypt->decode($data, $this->config->item('encryption_key'));
            $this->session->set_userdata('member_id', $id);
            $this->member_id = $id;
        } else {
            if (!$this->session->userdata('member_id')) redirect('auth/login');
            $this->member_id = $this->session->userdata('member_id');
        }
    }

    public function render($view, $data = array())
    {
        $this->load->view('header', $data);
        $this->load->view($view, $data);
        $this->load->view('footer', $data);
    }
    protected function _error($type)
    {
        if ($type=='login') {
            $this->setmsg('error', 'กรุณาตรวจสอบ username, password');
        }
    }


    protected function _save()
    {
        $this->setmsg('save', 1);
    }

    private function setmsg($type, $msg)
    {
        $this->session->set_flashdata($type, $msg);
    }
}
