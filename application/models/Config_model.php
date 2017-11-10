<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {
    public function __consturct()
    {
        parent::__consturct();
    }
    public function getAll()
    {
        return $this->db->get('config')->row();
    }

    public function getAllCut()
    {
        return $this->db->limit(1)->get('config_cut')->row();
    }

    public function updateConfig()
    {
    	$chk = $this->db->count_all_results('config');
    	if ($chk==0) {
    		$this->db->insert('config', array(
    			'two_top' => $this->input->post('two_top'),
    			'two_down' => $this->input->post('two_down'),
    			'three_top' => $this->input->post('three_top'),
    			'three_down' => $this->input->post('three_down'),
    			'three_tod' => $this->input->post('three_tod'),
    			'run_top' => $this->input->post('run_top'),
    			'run_down' => $this->input->post('run_down'),
    		));
    	} else {
    		$this->db->update('config', array(
    			'two_top' => $this->input->post('two_top'),
    			'two_down' => $this->input->post('two_down'),
    			'three_top' => $this->input->post('three_top'),
    			'three_down' => $this->input->post('three_down'),
    			'three_tod' => $this->input->post('three_tod'),
    			'run_top' => $this->input->post('run_top'),
    			'run_down' => $this->input->post('run_down'),
    		));

    	}

    }

    public function updateConfigCut()
    {
        $chk = $this->db->count_all_results('config_cut');
        if ($chk==0) {
            $this->db->insert('config_cut', array(
                'two_top' => $this->input->post('two_top'),
                'two_down' => $this->input->post('two_down'),
                'three_top' => $this->input->post('three_top'),
                'three_down' => $this->input->post('three_down'),
                'three_tod' => $this->input->post('three_tod'),
                'run_top' => $this->input->post('run_top'),
                'run_down' => $this->input->post('run_down'),
            ));
        } else {
            $this->db->update('config_cut', array(
                'two_top' => $this->input->post('two_top'),
                'two_down' => $this->input->post('two_down'),
                'three_top' => $this->input->post('three_top'),
                'three_down' => $this->input->post('three_down'),
                'three_tod' => $this->input->post('three_tod'),
                'run_top' => $this->input->post('run_top'),
                'run_down' => $this->input->post('run_down'),
            ));

        }

    }
}
