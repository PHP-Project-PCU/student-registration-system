<?php

namespace controllers;

use core\db\MySQL;
use models\AcademicYearModel;
use core\helpers\Constants;

class AcademicYearController
{
    private $academicYearModel;
    public function __construct()
    {
        $this->academicYearModel = new AcademicYearModel(new MySQL());
    }

    // public function createDept($data)
    // {
    //     return $this->academicYearModel->createDept(Constants::$DEPT_TBL, $data);
    // }
    public function index()
    {
        $academicYear = $this->academicYearModel->getAllAcademicYear(Constants::$ACADEMIC_YEAR_TBL);
        return $academicYear;
    }
    // public function updateDept($id, $data)
    // {
    //     $this->academicYearModel->updateDept(Constants::$DEPT_TBL, $id, $data);
    // }
    // public function deleteDept($id)
    // {
    //     $this->academicYearModel->deleteDept(Constants::$DEPT_TBL, $id);
    // }
}
