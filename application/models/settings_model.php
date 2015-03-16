<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class settings_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    function loadData() {
        $result = $this->search();

        if (count($result) == 0) {
            $errmsg = "<b>Settings not found on Database</b><br>"
                    . "Please contact Database Administrator or Software Developer !<br><br>"
                    . "<b>ข้อมูลตั้งค่า ไม่พบบนฐานข้อมูล</b><br>"
                    . "กรุณาติดต่อผู้ดูแลฐานข้อมูล หรือผู้พัฒนาซอฟต์แวร์เพื่อตรวจสอบและแก้ไขปัญหานี้<br><br>"
                    . "<b>Technical Info:</b>"
                    . "<p>" . var_export($result, true) . "</p>";

            show_error($errmsg);
        }
        foreach ($result as $row) {
            $data[$row->id] = $row->value;
        }
        return $data;
    }

    function save($data, $tablename = "") {
        parent::save($data, $tablename);
    }

}
