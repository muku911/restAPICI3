<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mUser extends CI_Model{
    function checkUser($userName=null){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('`user.userName`',$userName);
        $this->db->limit(1);
        return $this->db->get();
    }
}

?>