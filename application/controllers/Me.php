<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Me extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model', 'md');
    }
    
    public function index()
    {
        $data['r'] = $this->md->getId($this->member_id);
        $this->render('me/config', $data);
    }

    public function profile()
    {
        $data['r'] = $this->md->getId($this->member_id);
        $this->render('me/config', $data);
    }

    public function update()
    {
        $w = '';

        $r = $this->md->getId($this->member_id);

        if ($r->username != $this->input->post('username')) {
            $w = '|is_unique[member.username]';
        }
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'.$w
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {

            $this->md->updateProfile($this->member_id);
            $this->_save();
        }

        redirect('me/profile');
    }
}
