<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Config extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('config_model', 'cf');
    }
    public function index()
    {
        $data['r'] = $this->cf->getAll();
        $this->render('config/index', $data);
    }

    public function cut()
    {
        $data['r'] = $this->cf->getAllCut();
        $this->render('config/cut', $data);
    }
    public function update()
    {
        $this->cf->updateConfig();
        $this->_save();
        redirect('config');
    }

    public function update_cut()
    {
        $this->cf->updateConfigCut();
        $this->_save();
        redirect('config/cut');
    }
}
