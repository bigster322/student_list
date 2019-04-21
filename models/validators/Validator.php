<?php


class Validator {

    public function isEmail($str) {
        if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        throw new Exception('invalid Email');
    }

    public function isBool($str) {
        if ($str == '1' || $str == '0') {
            return true;
        }
        throw new Exception('invalid Bool');
    }

    public function isLettersOnly($str) {
        if (preg_match('/^[a-zA-Z]+$/', $str) || preg_match('/^[а-яА-Я]+$/u', $str)) {
            return true;
        }
        throw new Exception('Only Letters');
    }

    public function isLettersAndNumbersOnly($str) {
        if (preg_match("/^[a-zA-Z0-9]+$/", $str)) {
            return true;
        }
        throw new Exception('Only Letters and Numbers');
    }

    public function isNumbersOnly($str) {
        if ($str && preg_match("/^[0-9]+$/", $str)) {
            return true;
        }
        throw new Exception('Only Numbers');
    }

    public function strLen($min, $max, $str) {
        $str = strlen($str);

        if ($str >= $min && $str <= $max) {
            return true;
        }
        throw new Exception('String to large or to short');
    }
}