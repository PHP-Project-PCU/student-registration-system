<?php
namespace controllers;

use models\StudentAuthModel;

use core\db\MySQL;

use core\helpers\Constants;
class StudentAuthController
{

    private $studentAuthModel;

    public function __construct()
    {
        $this->studentAuthModel = new StudentAuthModel(new MySQL());
    }

    function studentLogin($studentAuthData)
    {
        $studentModel = $this->studentAuthModel;
        $studentId = $studentModel->findByStudentEduMailAndPasword(Constants::$STUDENT_AUTH_TBL, $studentAuthData['eduMail'], $studentAuthData['password']);
        return $studentId;
    }

    function updateStudentPassword($studentUpdatePasswordData)
    {
        $studentModel = $this->studentAuthModel;
        if ($studentModel) {
            return $studentModel->updateStudentPassword(Constants::$STUDENT_AUTH_TBL, $studentUpdatePasswordData['password'], $studentUpdatePasswordData['studentId']);
        } else {
            return "Database error occurred";
        }
    }

    function updateStudentResetStatus($studentId)
    {
        $studentModel = $this->studentAuthModel;
        if ($studentModel) {
            return $studentModel->updateStudentResetStatus(Constants::$STUDENT_AUTH_TBL, $studentId);
        } else {
            return "Database error occurred";
        }
    }

    function getStudentResetStatus()
    {
        $studentModel = $this->studentAuthModel;
        if ($studentModel) {
            return $studentModel->getStudentResetStatus(Constants::$STUDENT_AUTH_TBL);
        }
    }
}