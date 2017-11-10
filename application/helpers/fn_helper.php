<?php
function getname()
{
    $ci =& get_instance();
    $member_id = $ci->session->userdata('member_id');
    $ci->load->model('member_model');
    $rs = $ci->member_model->getId($member_id);

    return $rs->name;

}

function save()
{
	$ci =& get_instance();
	if ($ci->session->flashdata('save')) {
		return '<div class="alert alert-info">บันทึกเรียบร้อย</div>';
	}
}

function thaidate($ontime) {
	$time = strtotime($ontime);

	$thai_month_arr=array(
	    "0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน", 
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"                 
	);

	$thai_date_return="".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Yํ",$time)+543);
    return $thai_date_return;

}


function tod($number)
{
	$a = $number;
	$_a = str_split($a);
	$output = permutation($_a);

	return $output;
}


function permutation($_a, $buffer='', $delimiter='') {
	

    $output = array();

    $num = count($_a);
    if ($num > 1) {
        foreach ($_a as $key=>$val) {
            $temp = $_a;
            unset($temp[$key]);
            sort($temp);

            $return = permutation($temp, trim($buffer.$delimiter.$val, $delimiter), $delimiter);

            if(is_array($return)) {
                $output = array_merge($output, $return);
                $output = array_unique($output);
            }
            else {
                $output[] = $return;
            }

        }
        return $output;
    }
    else {
        return $buffer.$delimiter.$_a[0];
    }
}

