<?php

namespace controllers;

use models\StudentAdmissionModel;

use core\db\MySQL;
use core\helpers\Constants;
use StudentDataModel;

class StudentAdmissionController
{
    private $studentAdmissionModel;
    public function __construct()
    {
        $this->studentAdmissionModel = new StudentAdmissionModel(new MySQL());
    }

    public function setStudentAdmissions($data)
    {
        return $this->studentAdmissionModel->setStudentAdmissions(Constants::$STUDENT_TBL, $data);
    }
    public function getAllFreshersByStatus($status)
    {
        return $this->studentAdmissionModel->getAllFreshersByStatus(Constants::$STUDENT_TBL, $status);
    }
    public function getStudentById($status)
    {
        return $this->studentAdmissionModel->getStudentById($status);
    }
    public function approveFresher($data)
    {
        return $this->studentAdmissionModel->approveFresher(Constants::$STUDENT_TBL, Constants::$STUDENT_AUTH_TBL, $data);
    }
}
