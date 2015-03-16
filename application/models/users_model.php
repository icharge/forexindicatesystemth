<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class users_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function getLogin($user, $pass) {
        $query = $this->db
                ->where("username = '$user' AND password = '$pass'")
                ->get($this->table, 1);
        $result = $query->row_array();
        return $result;
    }

}
