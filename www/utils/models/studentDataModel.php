<?php

class StudentDataModel
{
    private $studentData;
    public function __construct($studentData)
    {
        $this->studentData = $studentData;
    }

    public function getStudentData()
    {
        return $this->studentData;
    }
}