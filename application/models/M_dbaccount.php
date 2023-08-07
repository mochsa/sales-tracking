<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_dbaccount extends CI_Model
{

    // Get Data
    public function lists()
    {
        $querry = "SELECT `tbl_user`.*, `user_role`.`role`
                    FROM `tbl_user` JOIN `user_role`
                    ON `tbl_user`.`role_id` = `user_role`.`id`
        ";
        return $this->db->query($querry)->result_array();
    }
}
