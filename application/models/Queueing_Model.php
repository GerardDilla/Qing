<?php


class Queueing_Model extends CI_Model{

    public function insert_counter($array)
    { 

        $this->db->insert('q_counter',$array);
        return $this->db->insert_id();

    }
    public function validate_duplicate_counter($array)
    { 
        
        $this->db->where('Counter',$array['Counter']);
        $result = $this->db->get('q_counter');
        return $result->num_rows();

    }
    public function insert_account($array)
    { 

        $this->db->insert('q_accounts',$array);
        return $this->db->insert_id();

    }
    public function account_list(){

        $this->db->where('active',1);
        $result = $this->db->get('q_accounts');
        $results = array(
           'array' =>  $result->result_array(),
           'count' =>  $result->num_rows(),
        );
        return $results;

    }
    public function validate_login($array)
    { 
        
        $this->db->where('username',$array['username']);
        $this->db->where('password',$array['password']);
        $this->db->where('active',1);
        $result = $this->db->get('q_accounts');
        $results = array(
            'array' =>  $result->result_array(),
            'count' =>  $result->num_rows(),
         );
         return $results;

    }
    public function validate_duplicate_account($array)
    { 
        
        $this->db->where('username',$array['username']);
        $this->db->where('active',1);
        $result = $this->db->get('q_accounts');
        return $result->num_rows();

    }
    public function counter_list(){

        $this->db->where('active',1);
        $result = $this->db->get('q_counter');
        return $result->result_array();

    }
    public function session_list(){

        $this->db->join('q_counter AS B','A.countID = B.countID');
        $this->db->join('q_accounts AS C','A.accountID = C.accountID');
        $this->db->where('A.active',1);
        $this->db->where('B.active',1);
        $this->db->where('C.active',1);
        $result = $this->db->get('q_sessions AS A');
        return $result->result_array();

    }
    public function session_info($array){

        $this->db->join('q_counter AS B','A.countID = B.countID');
        $this->db->join('q_accounts AS C','A.accountID = C.accountID');
        $this->db->where('A.active',1);
        $this->db->where('B.active',1);
        $this->db->where('C.active',1);
        $this->db->where('A.session_id',$array['session_id']);
        $result = $this->db->get('q_sessions AS A');
        $results = array(
            'array' =>  $result->result_array(),
            'count' =>  $result->num_rows(),
         );
         return $results;

    }
    public function custom_session($array){

        $this->db->trans_start();
        $this->db->where('session_id',$array['session_id']);
        $this->db->update('q_sessions',$array);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
    public function session_plus_count($array){

        $this->db->trans_start();
        $this->db->where('session_id',$array['session_id']);
        $this->db->set('Count', 'Count + 1', FALSE);
        $this->db->update('q_sessions');
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    public function session_minus_count($array){

        $this->db->trans_start();
        $this->db->where('session_id',$array['session_id']);
        $this->db->set('Count', 'Count - 1', FALSE);
        $this->db->update('q_sessions');
        $this->db->trans_complete();

        return $this->db->trans_status();
        
    }
    public function validate_duplicate_session($array)
    { 
        
        $this->db->where('countID',$array['countID']);
        $this->db->where('active',1);
        $result = $this->db->get('q_sessions');
        return $result->num_rows();

    }
    public function insert_session($array)
    { 

        $this->db->insert('q_sessions',$array);
        return $this->db->insert_id();

    }
    public function deactivate_session($array)
    { 
        $array_change['active'] = 0;
        $this->db->trans_start();
        $this->db->where('session_id',$array['session_id']);
        $this->db->update('q_sessions',$array_change);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }


}