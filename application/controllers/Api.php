<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {


	function __construct()

	{

		parent::__construct();

	} 

	
    function testing(){
        echo "200";
    }
    
    function updateUserData(){
        $post = $this->input->post();
        if(!isset($post['user_id'])){
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'User id not found']);
            exit;
        }

        $user_id = $post['user_id'];

        $recordExist = $this->db->get_where('member_poses',array('id'=>$user_id))->num_rows();
        $data = array(
            'id' => $user_id,
            'name' => $recordExist ? $post['name'] : "Unknown Visitor",
            'correct_poses' => $post['correct_poses'],
            'incorrect_poses' => $post['incorrect_poses'],
            'relate_aauth_id' => isset($post['relate_aauth_id'])? $post['relate_aauth_id'] : null,
        );

						
        if(!($recordExist)){
            $this->db->where('id',0);
            $this->db->update('member_poses',$data);
        }else{
            $this->db->where('id',$data['user_id']);
            $this->db->update('member_poses',$result_data);
        }
        

    }

    function getCurrentCount(){
        $get = $this->input->get();
        if(!isset($get['get_id'])){
           http_response_code(400); // Bad Request
            echo json_encode(['error' => 'User id not found']);
            exit;
        }
        $user_id = $get['get_id'];

        $record = $this->db->get_where('member_poses',array('id'=>$user_id))->row();
        if($record) echo json_encode($record);
    }
    
    function registerUser(){
        $post = $this->input->post();
        if(!isset($post['user_id'])||!isset($post['name'])||!isset($post['correct_poses'])||!isset($post['incorrect_poses'])){
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Data not provided']);
            exit;
        }
        
        if(user_exist_by_username($post['name'])){
            echo "User already exist";
            exit;
        }
        
        $created = $this->aauth->create_user($post['name']."@tracker.com", "12345", $post['name']);
        if($created){
            $created_user_id = $this->aauth->get_user_id($post['name']."@tracker.com");
        }else{
            var_dump($this->aauth->get_errors_array());
            exit;
        }

        $data = array(
            'id' => $post['user_id'],
            'name' => $post['name'],
            'correct_poses' => 0,
            'incorrect_poses' => 0,
            'relate_aauth_id' => $created_user_id,
        );

        if($this->db->insert('member_poses',$data)){
            echo "User created";
        }        
    }
}
