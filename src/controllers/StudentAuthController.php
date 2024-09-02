<?php
namespace controllers;

use models\StudentAuthModel;

use core\db\MySQL;

use core\helpers\Constants;
class StudentAuthController
{

    private $studentAuthData;

    private $studentUpdatePasswordData;

    public function __construct($studentAuthData = null, $studentUpdatePasswordData = null)
    {
        $this->studentAuthData = $studentAuthData;
        $this->studentUpdatePasswordData = $studentUpdatePasswordData;
    }

    function studentLogin()
    {
        $studentModel = new StudentAuthModel(new MySQL());
        $studentId = $studentModel->findByStudentEduMailAndPasword(Constants::$STUDENT_AUTH_TBL, $this->studentAuthData['eduMail'], $this->studentAuthData['password']);
        return $studentId;
    }

    function updateStudentPassword()
    {
        $adminModel = new StudentAuthModel(new MySQL());
        if ($adminModel) {
            return $adminModel->updateStudentPassword(Constants::$STUDENT_AUTH_TBL, $this->studentUpdatePasswordData['password'], $this->studentUpdatePasswordData['studentId']);
        } else {
            return "Database error occurred";
        }
    }
}