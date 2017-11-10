<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sale extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sale_model', 'sm');
        $this->load->model('config_model', 'cf');
        $this->load->model('customer_model', 'cm');
    }
    public function index()
    {
        $data['rs'] = $this->sm->getAll();
        $this->render('sale/index', $data);
    }

    public function add()
    {
        $this->render('sale/add_lot');
    }

    public function saveLot()
    {
        $config = array(
            array(
                'field' => 'lot_name',
                'label' => 'lot_name',
                'rules' => 'required'
            ),
            array(
                'field' => 'ondate',
                'label' => 'ondate',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $id = $this->sm->saveLot();
            redirect('sale/lot/'.$id);
        }
        redirect('sale');
    }
    public function lot($lot_id)
    {
        $data['rs'] = $this->sm->getLots($lot_id);
        $data['f'] = $this->sm->getLotId($lot_id);

        $data['customer'] = $this->cm->getAll();

        $this->render('sale/lot/index', $data);

    }

    public function lot_create()
    {
        $config = array(
            array(
                'field' => 'lot_id',
                'label' => 'lot_id',
                'rules' => 'required'
            ),
            array(
                'field' => 'customer_id',
                'label' => 'customer_id',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $id = $this->sm->createBill();

            redirect('sale/bill/'.$this->input->post('lot_id').'/'.$id);

        } else {
            echo validation_errors();
        }
        //redirect('sale');

    }

    public function bill($lot_id, $idsale)
    {

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $str = $this->input->post('txt');

           $raw_names = explode("\n", $str);
           $trimmed_names = array_map('trim', $raw_names);


           print_r($trimmed_names);

           foreach($trimmed_names as $t) {
            $comp = preg_split('/\s+/', $t);
            echo $comp[0].' - ';
            $words = preg_split('/[x|X]+/', $comp[1]);
            print_r($words);
           }

           $tod = tod('381');

           print_r($tod);


           exit();


        }
        $data['rs'] = $this->sm->getLots($lot_id);
        $data['f'] = $this->sm->getSaleId($idsale);
        $data['detail'] = $this->sm->getBillDetails($lot_id, $idsale);

        $this->render('sale/bill/item', $data);
    }

    public function delete_item($lot_id, $idsale, $idsale_detail)
    {
        $this->db->where('idsale_detail', $idsale_detail)->delete('sale_detail');
        $this->db->where('idsale_detail', $idsale_detail)->delete('sale_cut');
        $this->db->where('idsale_detail', $idsale_detail)->delete('sale_send');
        

        redirect('sale/bill/'.$lot_id.'/'.$idsale);
    }

    public function save_bill()
    {
        $config = array(
            array(
                'field' => 'lot_id',
                'label' => 'lot_id',
                'rules' => 'required'
            ),
            array(
                'field' => 'idsale',
                'label' => 'idsale',
                'rules' => 'required'
            ),
            array(
                'field' => 'no',
                'label' => 'no',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        $ar = array('result' => false);
        if ($this->form_validation->run()) {
            $data = $this->sm->saveBill();
            if ($data) {
                $ar = array(
                    'result' => true,
                    'data' => $data
                );
            }
        }

        echo json_encode($ar);
    }

    public function cut($lot_id, $idsale)
    {

        $data['rs'] = $this->sm->getLots($lot_id);
        $data['f'] = $this->sm->getSaleId($idsale);
        $data['detail'] = $this->sm->getBillDetails($lot_id, $idsale);

        $data['cut'] = $this->sm->getCuts($lot_id, $idsale);
        $data['send'] = $this->sm->getSends($lot_id, $idsale);

        $this->render('sale/bill/cut', $data);
    }

    public function confirm_cut($lot_id, $idsale)
    {
        $config = $this->cf->getAllCut();
        $top2 = $config->two_top;
        $down2 = $config->two_down;
        $top3 = $config->three_top;
        $tod3 = $config->three_tod;
        $down3 = $config->three_down;
        $runtop  = $config->run_top;
        $rundown = $config->run_down;

        $detail = $this->sm->getBillDetails($lot_id, $idsale);
        $no = 1;

        $this->db->where('lot_id', $lot_id)->where('idsale', $idsale)->delete('sale_cut');
        $this->db->where('lot_id', $lot_id)->where('idsale', $idsale)->delete('sale_send');


        foreach($detail as $d) {
           $this->sm->getSumCut($d->lot_id, $d->no, 'two_top', $top2, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'two_down', $down2, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'three_top', $top3, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'three_down', $down3, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'three_tod', $top3, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'top_run', $runtop, $d->idsale, $d->idsale_detail);
           $this->sm->getSumCut($d->lot_id, $d->no, 'down_run', $rundown, $d->idsale, $d->idsale_detail);
           $no++;


        }
        redirect('sale/cut/'.$lot_id.'/'.$idsale);

    }

   
}
