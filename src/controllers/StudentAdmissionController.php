<?php

namespace controllers;

use models\StudentAdmissionModel;

use core\db\MySQL;

class StudentAdmissionController
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}