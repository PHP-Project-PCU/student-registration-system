<?php

namespace controllers;

use models\StudentAdmissionModel;

use core\db\MySQL;

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
            $studentAdmissionModel->setStudentAdmissions("student_admission_tbl", $this->data->getStudentAdmissionData());
        }
    }

    public function setStudentAdmissionRequireFiles()
    {
        $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
        if ($studentAdmissionModel) {
            $studentAdmissionModel->setStudentAdmissions("student_admission_required_file_tbl", $this->data->getStudentAdmissionRequireFileData());
        }
    }

    public function setStudentParents()
    {
        $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
        if ($studentAdmissionModel) {
            $studentAdmissionModel->setStudentAdmissions("student_parent_tbl", $this->data->getStudentParentsData());
        }
    }

    public function setStudentGuardians()
    {
        $studentAdmissionModel = new StudentAdmissionModel(new MySQL());
        if ($studentAdmissionModel) {
            $studentAdmissionModel->setStudentAdmissions("guardian_tbl", $this->data->getStudentGuardians());
        }
    }
}