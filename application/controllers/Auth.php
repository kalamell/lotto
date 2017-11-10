<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model', 'mb');
    }
    public function index()
    {
        $this->load->view('auth/login');
    }

    public function do_login()
    {
        $this->load->library('encrypt');
        $config = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $chk = $this->mb->login();
            if (!$chk) $this->_error('login');
            if ($this->input->post('remember')) {
                $value = $this->encrypt->encode($chk->member_id, $this->config->item('encryption_key'));
                $cookie = array(
                    'name' => 'lotto_data',
                    'value' => $value,
                    'expire' => (60*60*24*365),
                );
                $this->input->set_cookie($cookie);
            }
            $this->session->set_userdata('member_id', $chk->member_id);
            redirect('');
        } else {
            $this->_error('login');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->load->helper('cookie');
        $this->session->set_userdata('member_id', '');
        $this->input->set_cookie(array(
            'name' => 'lotto_data',
            'value' => '',
            'expire' => ''
        ));
        redirect('');
    }

    private function _error($type) {
        $this->session->set_flashdata('error', 'กรุณาตรวจสอบ ชื่อผู้ใช้งาน กับรหัสผ่านใหม่อีกครั้ง');
    }
}
