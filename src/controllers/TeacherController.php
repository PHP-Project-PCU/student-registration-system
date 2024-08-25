<?php

namespace controllers;

use core\db\MySQL;
use models\TeacherModel;
use core\helpers\Constants;

class TeacherController
{
    private $teacherModel;
    public function __construct()
    {
        $this->teacherModel = new TeacherModel(new MySQL());
    }

    public function enrollNewTeacher($data)
    {
        return $this->teacherModel->enrollNewTeacher(Constants::$TEACHER_TBL, $data);
    }
    public function index()
    {
        $teachers = $this->teacherModel->getAllTeachers(Constants::$TEACHER_TBL);
        return $teachers;
    }
    public function updateTeacher($id, $data)
    {
        return $this->teacherModel->updateTeacher(Constants::$TEACHER_TBL, $id, $data);
    }
    public function deleteTeacher($id)
    {
        return $this->teacherModel->deleteTeacher(Constants::$TEACHER_TBL, $id);
    }
}
