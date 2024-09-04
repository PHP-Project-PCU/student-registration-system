<?php

namespace controllers;

use core\db\MySQL;
use models\SectionModel;
use core\helpers\Constants;

class SectionController
{
    private $sectionModel;
    public function __construct()
    {
        $this->sectionModel = new SectionModel(new MySQL());
    }
    public function index()
    {
        $sections = $this->sectionModel->getAllSections(Constants::$SECTION_TBL);
        return $sections;
    }
    public function getByStudentId($id)
    {
        return $this->sectionModel->getByStudentId(Constants::$STUDENT_SECTION_TBL, $id);
    }

    public function getTotalRows($semester, $section)
    {
        return $this->sectionModel->getTotalRows(Constants::$STUDENT_SECTION_TBL, $semester, $section);
    }

    public function updateStudentSemesterAndSection($semesterId, $sectionId, $studentId)
    {
        return $this->sectionModel->updateStudentSemesterAndSection(Constants::$STUDENT_SECTION_TBL, $semesterId, $sectionId, $studentId);
    }

    public function deleteStudentSemesterAndSection($studentId)
    {
        return $this->sectionModel->deleteStudentSemesterAndSection(Constants::$STUDENT_SECTION_TBL, $studentId);
    }
}
