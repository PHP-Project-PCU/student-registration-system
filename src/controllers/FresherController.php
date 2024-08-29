<?php

namespace controllers;

use core\db\MySQL;
use models\FresherModel;
use core\helpers\Constants;

class FresherController
{
    private $data;
    private $page;
    private $limit;

    private $updateData;

    private $passingYear;

    private $deleteData;
    public function __construct($data = null, $page = null, $limit = null, $updateData = null, $passingYear = null, $deleteData = null)
    {
        $this->data = $data;
        $this->page = $page;
        $this->limit = $limit;
        $this->updateData = $updateData;
        $this->passingYear = $passingYear == 'all' ? null : $passingYear;

        $this->deleteData = $deleteData;
    }

    public function setFreshers()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            if ($fresherModel->setFreshers(Constants::$FRESHER_TBL, $this->data)) {
                return true;
            }
        }

    }

    public function setIndividualFresher()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            if ($fresherModel->setIndividualFresher(Constants::$FRESHER_TBL, $this->data)) {
                return true;
            }
        }
    }

    public function getFresherPaginationData()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            $paginationFresherData = $fresherModel->getFresherPaginationData(Constants::$FRESHER_TBL, $this->page, $this->limit, $this->passingYear);
            return $paginationFresherData;
        } else {
            return "Cannot get Data";
        }
    }

    public function getTotalRows()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            $getTotalRows = $fresherModel->getTotalRows(Constants::$FRESHER_TBL, $this->passingYear);
            return $getTotalRows;
        } else {
            return "Cannot Get Data";
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

    public function updateFresher()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel->updateFresher(Constants::$FRESHER_TBL, $this->updateData)) {
            return true;
        }
    }

    public function updateFresherDeleteStatus()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel->updateFresherDeleteStatus(Constants::$FRESHER_TBL, $this->deleteData)) {
            return true;
        }
    }

    public function truncateFresherData()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            $fresherModel->truncateFresherData(Constants::$FRESHER_TBL);
            return true;
        }
    }

    public function getFresherPassingYear()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            $fresherPassingYears = $fresherModel->getFresherPassingYear(Constants::$FRESHER_TBL);
            return $fresherPassingYears;
        }
    }
}