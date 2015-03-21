<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Members_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function getLogin($user, $pass) {
        //die(get_Class($this));
        $query = $this->db
                ->where("username = '$user' AND password = '$pass'")
                ->get($this->table, 1);
        $result = $query->row_array();
        return $result;
    }
    
    function checkVip($ib) {
        
        $d = $this->search("ib = '$ib' AND status = 1", 'ib_vip');

        if (count($d) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
