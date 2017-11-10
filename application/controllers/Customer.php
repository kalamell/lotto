<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model', 'cm');
    }
    public function index()
    {
        $data['rs'] = $this->cm->getAll();
        $this->render('customer/index', $data);
    }

    public function add()
    {
        $this->render('customer/add');

    }

    public function save()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->_save();
            $this->cm->save();
        }

        redirect('customer/add');

    }

    public function edit($id)
    {
        $data['r'] = $this->cm->getId($id);

        $this->render('customer/edit', $data);

    }


     public function update()
    {
        $config = array(
            array(
                'field' => 'id',
                'label' => 'id',
                'rules' => 'required'
            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->_save();
            $this->cm->update();
        }

        redirect('customer/edit/'.$this->input->post('id'));

    }


    public function delete($id)
    {
        $this->cm->delete($id);
        redirect('customer');
    }
}
