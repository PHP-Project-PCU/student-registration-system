<?php

namespace controllers;

use core\db\MySQL;
use models\CourseModel;
use core\helpers\Constants;

class CourseController
{
    private $courseModel;
    public function __construct()
    {
        $this->courseModel = new CourseModel(new MySQL());
    }

    public function createCourse($data)
    {
        return $this->courseModel->createCourse(Constants::$COURSE_TBL, $data);
    }
    public function index()
    {
        $courses = $this->courseModel->getAllCourses(Constants::$COURSE_TBL);
        return $courses;
    }
    public function getAllCoursesBySemester($semesterId)
    {
        $courses = $this->courseModel->getAllCoursesBySemester(Constants::$COURSE_TBL, $semesterId);
        return $courses;
    }
    public function updateCourse($id, $data)
    {
        $this->courseModel->updateCourse(Constants::$COURSE_TBL, $id, $data);
    }
    public function deleteCourse($id)
    {
        $this->courseModel->deleteCourse(Constants::$COURSE_TBL, $id);
    }
}
