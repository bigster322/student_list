<?php

abstract class Mapper {

    protected $db_worker;
    protected $mysqli;

    protected $tableName;

    protected $orderBy = '';

    public function __construct(DB $db_worker) {
        $this->db_worker = $db_worker;
        $this->mysqli = $this->db_worker->mysqli;
        $this->tableName = $this->tableName();
    }

    protected function getByQuery($query) {
        $response = $this->mysqli->query($query);
        $arr = [];

        while ($data = $response->fetch_assoc()) {
            $arr[] = $data;
        }

        return $arr;
    }

    protected function execQuery($query) {
        $response = $this->mysqli->query($query);

        return $response;
    }

    protected abstract function arrToObj(array $arr);

    protected abstract function resToObj($res);

    protected abstract function tableName();


}