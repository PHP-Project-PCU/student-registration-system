<?php

namespace controllers;

use core\db\MySQL;
use models\SemesterModel;
use core\helpers\Constants;

class SemesterController
{
    private $semesterModel;
    public function __construct()
    {
        $this->semesterModel = new semesterModel(new MySQL());
    }
    public function index()
    {
        $semesters = $this->semesterModel->getAllSemesters(Constants::$SEMESTER_TBL);
        return $semesters;
    }
}
