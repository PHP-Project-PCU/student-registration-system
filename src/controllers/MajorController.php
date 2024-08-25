<?php

namespace controllers;

use core\db\MySQL;
use models\MajorModel;
use core\helpers\Constants;

class MajorController
{
    private $majorModel;
    public function __construct()
    {
        $this->majorModel = new MajorModel(new MySQL());
    }
    public function index()
    {
        $majors = $this->majorModel->getAllMajors(Constants::$MAJOR_TBL);
        return $majors;
    }
}
