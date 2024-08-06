<?php

namespace controllers;

use models\AuthModel;

use core\db\MySQL;

class AuthController
{
    private $admin_id;

    private $user_name;
    private $password;

    public function __construct($admin_id = null, $user_name = null, $password = null)
    {
        $this->admin_id = $admin_id;
        $this->user_name = $user_name;
        $this->password = $password;
    }

    function adminLogin()
    {
        $adminModel = new AuthModel(new MySQL());
        $admin = $adminModel->findByAdminUserNameAndPasword("admin_tbl", $this->user_name, $this->password);
        return $admin;
    }

    function getLastAdminRow()
    {
        $adminModel = new AuthModel(new MySQL());
        $lastAdmin = $adminModel->getLastAdminRow("admin_tbl");
        return $lastAdmin;
    }

    function updateAdminPassword()
    {
        $adminModel = new AuthModel(new MySQL());
        if ($adminModel) {
            $adminModel->updateAdminPassword("admin_tbl", $this->password, $this->admin_id);
        } else {
            return "Database error occurred";
        }
    }
}