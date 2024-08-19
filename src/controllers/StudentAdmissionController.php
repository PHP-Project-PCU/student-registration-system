<?php

namespace controllers;

use models\StudentAdmissionModel;

use core\db\MySQL;
use core\helpers\Constants;

class StudentAdmissionController
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function setStudentAdmissions()
    {
        $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
        if ($studentAdmissionModel) {
            return $studentAdmissionModel->setStudentAdmissions(Constants::$STUDENT_TBL, $this->data);
        }
        return false;
    }

    // public function setStudentAdmissionRequireFiles()
    // {
    //     $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
    //     if ($studentAdmissionModel) {
    //         $studentAdmissionModel->setStudentAdmissions(Constants::$STUDENT_ADMISSION_REQUIRED_FILE_TBL, $this->data->getStudentAdmissionRequireFileData());
    //     }
    // }

    // public function setStudentParents()
    // {
    //     $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
    //     if ($studentAdmissionModel) {
    //         $studentAdmissionModel->setStudentAdmissions(Constants::$STUDENT_PARENT_TBL, $this->data->getStudentParentsData());
    //     }
    // }

    // public function setStudentGuardians()
    // {
    //     $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
    //     if ($studentAdmissionModel) {
    //         $studentAdmissionModel->setStudentAdmissions(Constants::$GURDIAN_TBL, $this->data->getStudentGuardians());
    //     }
    // }
}
