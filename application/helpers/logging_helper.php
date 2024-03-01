<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a PHP library that handles logging things.
 *   
 * @access   public
 * @return   mixed
 * 
 */


 function __construct() {
    $CI = & get_instance();

}



function proxyLogging($data)
{
    
    $user = $CI->aauth->get_user();
    $output = array(
        'mp_mem_id'=>$data['mp_mem_id'],
        'mp_mem_account'=>$data['mem_card_id'],
        'mem_name'=>$data['mem_name'],
        'mem_en_name'=>$data['mem_en_name'],
        'mem_unit'=>$data['mem_unit'],
        'mp_mem_assign_to'=>$data['mem_proxy'],
        'mp_proxy_date'=>$data['mem_proxy_date'],
        'mp_remark'=>$data['mem_proxy_remark'],
        'mp_proxy_status'=>$data['mp_proxy_status'],
        'mp_mem_datetime'=>$data['mp_mem_datetime'],
        'operator_id'=> $user->id
    );
    $CI->db->insert('member_proxy_log',$output);
 

}




?>
