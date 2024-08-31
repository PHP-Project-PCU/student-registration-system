<?php

namespace controllers;

use models\StudentAdmissionModel;

use core\db\MySQL;
use core\helpers\Constants;

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

    // for credit transfer students status=2
    public function setStudentAdmissionsByStatus($data)
    {
        return $this->studentAdmissionModel->setStudentAdmissionsByStatus(Constants::$STUDENT_TBL, $data);
    }
    public function getAllFreshersByStatus($status, $year)
    {
        return $this->studentAdmissionModel->getAllFreshersByStatusAndYear(Constants::$STUDENT_TBL, $status, $year);
    }
    public function getStudentById($status)
    {
        return $this->studentAdmissionModel->getStudentById($status);
    }
    public function approveFresher($data)
    {
        return $this->studentAdmissionModel->approveFresher(Constants::$STUDENT_TBL, Constants::$STUDENT_AUTH_TBL, $data);
    }

    public function getStudentsYear()
    {
        return $this->studentAdmissionModel->getStudentsYear(Constants::$STUDENT_TBL);
    }

    public function getApprovedStudentsYear()
    {
        return $this->studentAdmissionModel->getApprovedStudentsYear(Constants::$STUDENT_TBL);
    }

    public function getStudentAdmissionTotalCount($studentYear)
    {
        return $this->studentAdmissionModel->getStudentAdmissionTotalCount(Constants::$STUDENT_TBL, $studentYear);
    }

    public function getStudentAdmissionApprovedCount($studentYear)
    {
        return $this->studentAdmissionModel->getStudentAdmissionApprovedCount(Constants::$STUDENT_TBL, $studentYear);
    }

    public function getApprovedStudentsRollNum($studentYear)
    {
        return $this->studentAdmissionModel->getApprovedStudentsRollNum(Constants::$STUDENT_TBL, $studentYear);
    }

    public function getStudentIdBetweenRollNum($startRollNum, $endRollNum)
    {
        return $this->studentAdmissionModel->getStudentIdBetweenRollNum(Constants::$STUDENT_TBL, $startRollNum, $endRollNum);
    }
}