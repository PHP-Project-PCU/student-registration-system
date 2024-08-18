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
    public function __construct($data = null, $page = null, $limit = null)
    {
        $this->data = $data;
        $this->page = $page;
        $this->limit = $limit;
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
            $paginationFresherData = $fresherModel->getFresherPaginationData(Constants::$FRESHER_TBL, $this->page, $this->limit);
            return $paginationFresherData;
        } else {
            return "Cannot get Data";
        }
    }

    public function getTotalRows()
    {
        $fresherModel = new FresherModel(new MySQL());
        if ($fresherModel) {
            $getTotalRows = $fresherModel->getTotalRows(Constants::$FRESHER_TBL);
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
}