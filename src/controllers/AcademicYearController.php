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

    public function createAcademicYear($data)
    {
        return $this->academicYearModel->createAcademicYear(Constants::$ACADEMIC_YEAR_TBL, $data);
    }
    public function index()
    {
        $academicYear = $this->academicYearModel->getAllAcademicYear(Constants::$ACADEMIC_YEAR_TBL);
        return $academicYear;
    }
    public function updateAcademicYear($id, $data)
    {
        $this->academicYearModel->updateAcademicYear(Constants::$ACADEMIC_YEAR_TBL, $id, $data);
    }
    public function deleteAcademicYear($id)
    {
        $this->academicYearModel->deleteAcademicYear(Constants::$ACADEMIC_YEAR_TBL, $id);
    }
}
