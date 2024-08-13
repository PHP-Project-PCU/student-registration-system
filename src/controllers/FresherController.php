<?php

namespace controllers;

use models\FresherModel;

use core\db\MySQL;

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

}