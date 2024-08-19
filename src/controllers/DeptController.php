<?php

namespace controllers;

use core\db\MySQL;
use models\DeptModel;
use core\helpers\Constants;

class DeptController
{
    private $deptModel;
    public function __construct()
    {
        $this->deptModel = new DeptModel(new MySQL());
    }

    public function createDept($data)
    {
        return $this->deptModel->createDept(Constants::$DEPT_TBL, $data);
    }
    public function index()
    {
        $departments = $this->deptModel->getAllDepts(Constants::$DEPT_TBL);
        return $departments;
    }
    public function updateDept($id, $data)
    {
        $this->deptModel->updateDept(Constants::$DEPT_TBL, $id, $data);
    }
    public function deleteDept($id)
    {
        $this->deptModel->deleteDept(Constants::$DEPT_TBL, $id);
    }
}
