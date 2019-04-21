<?php

class Pager {

    private $totalRecords;
    public $perPage;
    private $pageLink;

    public function __construct($perPage = 5, $pageLink = 'page=') {
        $this->perPage = $perPage;
        $this->pageLink = $pageLink;
    }

    public function getTotalPages() {
        return ceil($this->totalRecords / $this->perPage);
    }

    public function getLinkForPage($page) {
        return $this->pageLink . $page;
    }

    public function totalRecords($count) {
        $this->totalRecords = $count;
    }

}