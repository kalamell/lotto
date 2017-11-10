<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends CI_Model {
    public function __consturct()
    {
        parent::__consturct();
    }
    public function getAll()
    {
        return $this->db->select('sale_lot.lot_id, lot_name, COUNT(idsale) as c, sale_lot.ondate')
                        ->join('sale', 'sale_lot.lot_id = sale.lot_id', 'LEFT')
                        ->group_by('sale_lot.lot_id')
                        ->order_by('sale_lot.ondate', 'DESC')->get('sale_lot')->result();
    }

    public function saveLot()
    {
        $rs = $this->db->where('ondate', $this->input->post('ondate'))->get('sale_lot');
        if ($rs->num_rows()==0) {
            $this->db->insert('sale_lot', array(
                'ondate' => $this->input->post('ondate'),
                'lot_name' => $this->input->post('lot_name'),
                'remark' => $this->input->post('remark'),
            ));
            return $this->db->insert_id();
        } else {
            return $rs->row()->lot_id;
        }

    }


    public function getLotId($lot_id)
    {
        return $this->db->where('lot_id', $lot_id)->get('sale_lot')->row();
    }

    public function getLots($lot_id)
    {
        $rs = $this->db->select('sale.lot_id, sale.idsale, customer.name, ( SUM(two_top) + SUM(two_down) + SUM(three_top) + SUM(three_down) + SUM(three_tod) + SUM(top_run) + SUM(down_run)) as sum_total')->join('customer', 'sale.customer_id = customer.id', 'LEFT')
                        ->join('sale_detail', 'sale.idsale = sale_detail.idsale', 'LEFT')
                        ->where('sale.lot_id', $lot_id)
                        ->group_by('sale.idsale')
                        ->get('sale');
        return $rs->result();
    }

    public function createBill()
    {
        $rs = $this->db->where(array(
            'customer_id' => $this->input->post('customer_id'),
            'lot_id' => $this->input->post('lot_id')
        ))->get('sale');

        if ($rs->num_rows()==0) {
            $this->db->insert('sale', array(
                'lot_id' => $this->input->post('lot_id'),
                'customer_id' =>  $this->input->post('customer_id'),
                'status' => 'pending',
                'discount' => 0,
            ));
            return $this->db->insert_id();
        } else {
            return $rs->row()->idsale;
        }
    }

    public function getSaleId($idsale)
    {
        $rs = $this->db->join('customer', 'sale.customer_id = customer.id')
                    ->join('sale_lot', 'sale.lot_id = sale_lot.lot_id')
                    ->where('idsale', $idsale)->get('sale');
        return $rs->row();
    }

    public function saveBill()
    {
        $data = $this->input->post();
        foreach($data as $inx => $val) {
            $this->db->set($inx, $val);
        }
        $save = $this->db->insert('sale_detail');
        if ($save) {
            $idsale_detail = $this->db->insert_id();
            return $this->getBillDetailId($idsale_detail);
        }
        return false;

    }

    public function getBillDetails($lot_id, $idsale)
    {
        return $this->db->select()->where(array(
            'lot_id' => $lot_id,
            'idsale' => $idsale
        ))->order_by('idsale_detail', 'DESC')->get('sale_detail')->result();
    }

    public function getBillDetailsAll($lot_id, $type = '')
    {
        if ($type=='') {
            $table = 'sale_detail';
        } else {
            $table = $type;
        }
        return $this->db->where(array(
            'lot_id' => $lot_id,
        ))->order_by('idsale_detail', 'DESC')->get($table)->result();
    }

    public function getBillDetailId($idsale_detail)
    {
        $rs = $this->db->where('idsale_detail', $idsale_detail)->get('sale_detail');
        return $rs->row();
    }

    
    public function getSumCutx($lot_id, $no, $field, $total, $idsale, $idsale_detail)
    {
        $dt = $this->getBillDetailId($idsale_detail);

        $total_sum = 0; // จำนวนเงินที่รับมาแล้วทั้งหมดว่าเหลือกี่บาท

        $rs = $this->db->select('SUM(two_top) as two_top, SUM(two_down) as two_down,  SUM(three_top) as three_top, SUM(three_down) as three_down, SUM(three_tod) as three_tod, SUM(top_run) as top_run, SUM(down_run) as down_run')->where('lot_id', $lot_id)->where('no', $no)->group_by('no')->get('sale_cut');

        if ($rs->num_rows()==0) {
            $del_cut = $total - $total_sum; // เอาค่าที่ตั้งค่าไว้ ลบกับ ค่าที่คัดไปแล้วว่าเหลือรับได้อีกกี่บาท
            if ($del_cut >= 0) { // ถ้ายังมีเงินเหลืออยู่
                if ($dt->$field <= $del_cut) { // ตรวจสอบว่า เงินที่จะรับ มีค่าน้อยกว่าหรือเท่ากับเงินคงเหลือ ถ้าตรงตามเงื่อไข จะรับห
                    $this->db->insert('sale_cut', array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        $field => $dt->$field,
                        'lot_id' => $lot_id
                    ));
                } else { // ถ้าเหลือมากกว่า จะตัดเอาที่ได้
                    $del_cut_total = $dt->$field - $del_cut; // เอาส่วนต่างเพื่อจัดเก็บ
                    if ($del_cut_total > 0) {
                        $this->db->insert('sale_send', array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            $field => $del_cut_total,
                            'lot_id' => $lot_id
                        ));
                    }

                    $del_cut_total_send = $dt->$field - $del_cut_total;
                    if ($del_cut_total_send > 0) { // ถ้าหากมีค่าเหลือ
                        $chk = $this->db->where(array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id
                        ))->get('sale_cut');
                        if ($chk->num_rows()==0) {
                            $this->db->insert('sale_cut', array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                $field => $del_cut_total_send,
                                'lot_id' => $lot_id
                            ));
                        } else {
                            $this->db->set( $field, $del_cut_total_send);
                            $this->db->where(array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                'lot_id' => $lot_id
                            ))->update('sale_cut');
                        }
                    }
                }
            }
        } else {
            $rs = $this->db->select('SUM(two_top) as two_top, SUM(two_down) as two_down,  SUM(three_top) as three_top, SUM(three_down) as three_down, SUM(three_tod) as three_tod, SUM(top_run) as top_run, SUM(down_run) as down_run')->where('lot_id', $lot_id)->where('no', $no)->group_by('no')->get('sale_cut');

            $total_sum = $rs->row()->$field;
            $del_cut = $total - $total_sum; // เอาค่าที่ตั้งค่าไว้ ลบกับ ค่าที่คัดไปแล้วว่าเหลือรับได้อีกกี่บาท
            if ($del_cut >= 0) { // ถ้ายังมีเงินเหลืออยู่
               // echo $no.' - '.$total.' - '.$total_sum.' >>>> ';
                if ($dt->$field <= $del_cut) { // ตรวจสอบว่า เงินที่จะรับ มีค่าน้อยกว่าหรือเท่ากับเงินคงเหลือ ถ้าตรงตามเงื่อไข จะรับห
                    echo $no.' +++++++++';
                    $chk = $this->db->where(array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id
                    ))->get('sale_cut');

                    if ($chk->num_rows()>0) {
                        echo $no.' >>>>>>> ';
                        $this->db->set($field, $dt->$field);
                        $this->db->where(array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id
                        ))->update('sale_cut');
                    } else {
                        echo $no.' ---------- ';
                        $this->db->insert('sale_cut', array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            $field => $dt->$field,
                            'lot_id' => $lot_id
                        ));
                    }

                } else { // ถ้าเหลือมากกว่า จะตัดเอาที่ได้
                    if ($del_cut <=0) {
                        $del_cut_total = $del_cut;
                    } else  {
                        $del_cut_total = $dt->$field - $del_cut; // เอาส่วนต่างเพื่อจัดเก็บ
                    }

                    //echo $idsale_detail.' : '.$del_cut_total.' - '.$dt->$field.' - '.$del_cut." ::: ". $total_sum ."<br>";
                    if ($del_cut_total > 0) {
                        $chk = $this->db->where(array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id
                        ))->get('sale_cut');
                        if ($chk->num_rows()>0) {
                            $this->db->set($field, $del_cut_total);
                            $this->db->where(array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                'lot_id' => $lot_id
                            ))->update('sale_cut');
                        } else {

                            $this->db->insert('sale_cut', array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                $field => $del_cut_total,
                                'lot_id' => $lot_id
                            ));

                        }
                    }

                    $del_cut_total_send = $dt->$field - $del_cut_total;
                    if ($del_cut_total_send > 0) { // ถ้าหากมีค่าเหลือ
                        $chk = $this->db->where(array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id
                        ))->get('sale_send');
                        if ($chk->num_rows()==0) {
                            $this->db->insert('sale_send', array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                $field => $del_cut_total_send,
                                'lot_id' => $lot_id
                            ));
                        } else {
                            $this->db->set( $field, $del_cut_total_send);
                            $this->db->where(array(
                                'idsale_detail' => $idsale_detail,
                                'idsale' => $idsale,
                                'no' => $no,
                                'lot_id' => $lot_id
                            ))->update('sale_send');
                        }
                    }

                }
            }
        }

    }

    

    public function getSumCut($lot_id, $no, $field, $total_config, $idsale, $idsale_detail)
    {
        $dt = $this->getBillDetailId($idsale_detail);
        $sale = $dt->$field;


        //echo 'idsale_detail'. $idsale_detail.' --- '.$no.' NO '.$no.' >>>>> ';

  

        $sale_cut = $this->db->select('no, SUM(two_top) as two_top, SUM(two_down) as two_down,  SUM(three_top) as three_top, SUM(three_down) as three_down, SUM(three_tod) as three_tod, SUM(top_run) as top_run, SUM(down_run) as down_run')->where('lot_id', $lot_id)->where('no', $no)->group_by('no')->get('sale_cut');


        //echo ' num '.$sale_cut->num_rows();


        if ($sale_cut->num_rows()==0) {
            if ($sale <= $total_config) {

                $this->db->set('created_date', 'NOW()', false);
                $this->db->insert('sale_cut', array(
                    'idsale_detail' => $idsale_detail,
                    'idsale' => $idsale,
                    'no' => $no,
                    'lot_id' => $lot_id,
                    $field => $sale
                ));

               // echo $this->db->last_query()." >>>>> \n";


            } else {
                
                $save_for_send = $total_config - $sale;

                $this->db->set('created_date', 'NOW()', false);
                $this->db->insert('sale_send', array(
                    'idsale_detail' => $idsale_detail,
                    'idsale' => $idsale,
                    'no' => $no,
                    'lot_id' => $lot_id,
                    $field => abs($save_for_send)
                ));
               // echo ' ++++ save send '.$this->db->last_query()." ++++ ";

                $save_for_cut = $sale - (abs($save_for_send));

                $this->db->set('created_date', 'NOW()', false);
                $this->db->insert('sale_cut', array(
                    'idsale_detail' => $idsale_detail,
                    'idsale' => $idsale,
                    'no' => $no,
                    'lot_id' => $lot_id,
                    $field => $save_for_cut
                ));
               // echo $this->db->last_query()." '''' ";

            }
        } else {

            $total_cut = $sale_cut->row()->$field;



            if ($total_config <= $total_cut) {

                $chk = $this->db->where(array(
                    'idsale_detail' => $idsale_detail,
                    'idsale' => $idsale,
                    'no' => $no,
                    'lot_id' => $lot_id,
                ))->get('sale_send');

                if ($chk->num_rows()==0) {
                    $this->db->set('created_date', 'NOW()', false);
                    $this->db->insert('sale_send', array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id,
                        $field => $sale
                    ));
                } else {
                    $this->db->where(array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id,
                    ))->update('sale_send', array(
                         $field => $sale
                    ));
                }

            } else {
                
                // คงเหลือที่ add ได้
                $total_delete = $total_cut - $total_config;


                if ($sale <= abs($total_delete)) {
                    $chk = $this->db->where(array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id,
                    ))->get('sale_cut');

                    if ($chk->num_rows()==0) {
                        $this->db->set('created_date', 'NOW()', false);
                        $this->db->insert('sale_cut', array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id,
                            $field => $sale
                        ));
                    } else {
                        $this->db->where(array(
                            'idsale_detail' => $idsale_detail,
                            'idsale' => $idsale,
                            'no' => $no,
                            'lot_id' => $lot_id,
                        ))->update('sale_cut', array(
                             $field => $sale
                        ));
                    }
                } else {

                    $save_for_send = abs($total_delete) - $sale;

                    $this->db->set('created_date', 'NOW()', false);
                    $this->db->insert('sale_send', array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id,
                        $field => abs($save_for_send)
                    ));
                   // echo ' ++++ save send '.$this->db->last_query()." ++++ ";

                    $save_for_cut = $sale - (abs($save_for_send));

                    $this->db->set('created_date', 'NOW()', false);
                    $this->db->insert('sale_cut', array(
                        'idsale_detail' => $idsale_detail,
                        'idsale' => $idsale,
                        'no' => $no,
                        'lot_id' => $lot_id,
                        $field => $save_for_cut
                    ));

                }

            }
            

            

         }
    }

    public function getCuts($lot_id, $idsale)
    {
        $rs = $this->db->select('*')->where('lot_id', $lot_id)->where('idsale', $idsale)->order_by('idsale_detail', 'DESC')->get('sale_cut');
        return $rs->result();
    }

    public function getSends($lot_id, $idsale)
    {
        $rs = $this->db->select('*')->where('lot_id', $lot_id)->where('idsale', $idsale)->order_by('idsale_detail', 'DESC')->get('sale_send');
        return $rs->result();
    }
}
/*
mysql> set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
mysql> set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
*/
