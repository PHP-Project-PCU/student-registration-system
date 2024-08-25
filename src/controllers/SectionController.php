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
}
