<?php

class StudentDataModel
{
    private $studentAdmissionData;
    private $studentAdmissionRequireFileData;
    private $studentParentData;
    private$studnetGuardianData;
    public function __construct($studentAdmissionData,$studentAdmissionRequireFileData,$studentParentData,$studnetGuardianData)
    {
        $this->studentAdmissionData = $studentAdmissionData;
        $this->studentAdmissionRequireFileData = $studentAdmissionRequireFileData;
        $this->studentParentData = $studentParentData;
        $this->studnetGuardianData = $studnetGuardianData;
    }

    public function getStudentAdmissionData()
    {
        return $this->studentAdmissionData;
    }

    public function getStudentAdmissionRequireFileData()
    {
        return $this->studentAdmissionRequireFileData;
    }

    public function getStudentParentsData()
    {
        return $this->studentParentData;
    }

    public function getStudentGuardians()
    {
        return $this->studnetGuardianData;
    }

}