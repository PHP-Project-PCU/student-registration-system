<?php
namespace controllers;

use models\StudentTimetableModel;

use core\db\MySQL;

use core\helpers\Constants;
class StudentTimetableController
{
    private $studentTimetableModel;

    public function __construct()
    {
        $this->studentTimetableModel = new StudentTimetableModel(new MySQL());
    }

    public function getSemesterIdAndSectionIdByStudentId($studentId)
    {
        return $this->studentTimetableModel->getSemesterIdAndSectionIdByStudentId(Constants::$STUDENT_SECTION_TBL, $studentId);
    }

    public function getAcademicYear($studentId)
    {
        return $this->studentTimetableModel->getAcademicYear(Constants::$STUDENT_TBL, $studentId);
    }

    public function getSemester($semesterId)
    {
        return $this->studentTimetableModel->getSemester(Constants::$SEMESTER_TBL, $semesterId);
    }

    public function getSection($sectionId)
    {
        return $this->studentTimetableModel->getSection(Constants::$SECTION_TBL, $sectionId);
    }

    public function getTimeTableData($sectionId, $semesterId)
    {
        return $this->studentTimetableModel->getTimeTableData(Constants::$TIMETABLE_TBL, $sectionId, $semesterId);
    }

    public function getTeachers($teacherId)
    {
        return $this->studentTimetableModel->getTeachers(Constants::$TEACHER_TBL, $teacherId);
    }

    public function getCourses($courseId)
    {
        return $this->studentTimetableModel->getCourses(Constants::$COURSE_TBL, $courseId);
    }
}