<?php

namespace controllers;

use core\db\MySQL;
use models\FresherModel;
use core\helpers\Constants;

class FresherController
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function setFreshers()
    {
        $studentAdmissionModel = new FresherModel(new MySQL());
        if ($studentAdmissionModel) {
            $studentAdmissionModel->setFreshers(Constants::$FRESHER_TBL, $this->data);
        }
    }

    public function checkFresher($data)
    {
        $fresherModel = new FresherModel(new MYSQL());
        if ($fresherModel) {
            list($rollNum, $year) = $data;

            return $fresherModel->checkFresher(Constants::$FRESHER_TBL, $rollNum, $year);
        }
        return false;
    }
}
