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
    public function validate_duplicate_account($array)
    { 
        
        $this->db->where('username',$array['username']);
        $this->db->where('active',1);
        $result = $this->db->get('q_accounts');
        return $result->num_rows();

    }
    public function counter_list(){

        $this->db->join('q_accounts as B','A.accountID = B.accountID ','left');;
        $this->db->where('A.active',1);
        $this->db->where('B.active',1);
        $result = $this->db->get('q_counter as A');
        return $result->result_array();

    }


}