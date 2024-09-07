<?php

namespace controllers;

use core\db\MySQL;
use models\AchievementModel;
use core\helpers\Constants;

class AchievementController
{
    private $data;
    private $page;
    private $limit;

    private $updateData;

    private $academicYear;
    private $semester;


    private $deleteData;

    public function __construct($data = null, $page = null, $limit = null, $updateData = null, $semester = null, $academicYear = null, $deleteData = null)
    {
        $this->data = $data;
        $this->page = $page;
        $this->limit = $limit;
        $this->updateData = $updateData;
        $this->academicYear = $academicYear == 'all' ? null : $academicYear;
        $this->semester = $semester == 'all' ? null : $semester;

        $this->deleteData = $deleteData;
    }

    public function setAchievements()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            if ($achievementModel->setAchievements(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->data)) {
                return true;
            }
        }
    }

    public function setIndividualAchievement()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            if ($achievementModel->setIndividualAchievement(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->data)) {
                return true;
            }
        }
    }

    public function getAchievementPaginationData()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            $paginationAchievementData = $achievementModel->getAchievementPaginationData(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->page, $this->limit, $this->semester, $this->academicYear);
            return $paginationAchievementData;
        } else {
            return "Cannot get Data";
        }
    }

    public function getTotalRows()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            $getTotalRows = $achievementModel->getTotalRows(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->semester, $this->academicYear);
            return $getTotalRows;
        } else {
            return "Cannot Get Data";
        }
    }

    public function checkAchievement($data)
    {
        $achievementModel = new AchievementModel(new MYSQL());
        if ($achievementModel) {
            list($rollNum, $semester, $year, $studentId) = $data;

            $result = $achievementModel->checkAchievement(Constants::$STUDENT_ACHIEVEMENT_TBL, $rollNum, $semester, $year);
            if ($result == true)
                return $this->setStatus(1, $studentId);
        }
        return false;
    }
    public function setStatus($status, $studentId)
    {
        $achievementModel = new AchievementModel(new MYSQL());
        return $achievementModel->setStatus(Constants::$STUDENT_SECTION_TBL, $status, $studentId);
    }

    public function updateAchievement()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel->updateAchievement(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->updateData)) {
            return true;
        }
    }

    // public function updateAchievementDeleteStatus()
    // {
    //     $achievementModel = new AchievementModel(new MySQL());
    //     if ($achievementModel->updateAchievementDeleteStatus(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->deleteData)) {
    //         return true;
    //     }
    // }

    // public function truncateAchievementData()
    // {
    //     $achievementModel = new AchievementModel(new MySQL());
    //     if ($achievementModel) {
    //         $achievementModel->truncateAchievementData(Constants::$STUDENT_ACHIEVEMENT_TBL);
    //         return true;
    //     }
    // }

    public function getAchievementAcademicYear()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            $achievementYears = $achievementModel->getAchievementAcademicYear(Constants::$STUDENT_ACHIEVEMENT_TBL);
            return $achievementYears;
        }
    }

    public function getAchievementSemester()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            $achievementSemesters = $achievementModel->getAchievementSemester(Constants::$STUDENT_ACHIEVEMENT_TBL);
            return $achievementSemesters;
        }
    }

    public function deleteAchievement()
    {
        $achievementModel = new AchievementModel(new MySQL());
        if ($achievementModel) {
            $achievementPassingYears = $achievementModel->deleteAchievement(Constants::$STUDENT_ACHIEVEMENT_TBL, $this->deleteData['id']);
            return $achievementPassingYears;
        }
    }
}
