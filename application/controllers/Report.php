<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model', 'sm');
        $this->load->model('customer_model', 'cm');
        $this->load->model('config_model', 'cf');
    }
    public function index()
    {
        $data['rs'] = $this->sm->getAll();
        $this->render('report/index', $data);
    }

    public function lot($lot_id)
    {
        $data['f'] = $this->sm->getLotId($lot_id);
        $data['detail'] = $this->sm->getBillDetailsAll($lot_id);
        $this->load->view('report/print', $data);
    }

    public function lot_cut($lot_id)
    {
        $data['f'] = $this->sm->getLotId($lot_id);
        $data['detail'] = $this->sm->getBillDetailsAll($lot_id, 'sale_cut');
        $this->load->view('report/print', $data);
    }

    public function lot_send($lot_id)
    {
        $data['f'] = $this->sm->getLotId($lot_id);
        $data['detail'] = $this->sm->getBillDetailsAll($lot_id, 'sale_send');
        $this->load->view('report/print', $data);
    }
}