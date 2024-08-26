<?php

namespace controllers;

use core\db\MySQL;
use models\TimetableModel;
use core\helpers\Constants;

class TimetableController
{
    private $timetableModel;
    public function __construct()
    {
        $this->timetableModel = new TimetableModel(new MySQL());
    }

    public function createTimeTable($data)
    {
        return $this->timetableModel->createTimeTable(Constants::$TIMETABLE_TBL, $data);
    }
    public function index()
    {
        $timetables = $this->timetableModel->getAllTimetables(Constants::$TIMETABLE_TBL);
        return $timetables;
    }
    public function getTimetableByDSSM($day, $sectionId, $semesterId, $majorId)
    {
        $timetables = $this->timetableModel->getTimetableByDSSM(Constants::$TIMETABLE_TBL, $day, $sectionId, $semesterId, $majorId);
        return $timetables;
    }
    public function updateTimetable($id, $data)
    {
        $this->timetableModel->updateTimetable(Constants::$TIMETABLE_TBL, $id, $data);
    }
    public function deleteTimetable($id)
    {
        $this->timetableModel->deleteTimetable(Constants::$TIMETABLE_TBL, $id);
    }
}
