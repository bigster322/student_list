<?php

include_once 'Validator.php';

class StudentValidator extends Validator {

    public function isName($str) {
        try {
            $this->isLettersOnly($str);
            $this->strLen(2, 20, $str);

            return true;
        } catch (Exception $e) {
            throw new Exception('Name - '. $e->getMessage());
        }
    }
    public function isPassword($str) {
        try {
            $this->isLettersAndNumbersOnly($str);
            $this->strLen(2, 20, $str);

            return true;
        } catch (Exception $e) {
            throw new Exception('Password - '. $e->getMessage());
        }
    }

    public function isSurname($str) {
        try {
            $this->isLettersOnly($str);
            $this->strLen(2, 20, $str);

            return true;
        } catch (Exception $e) {
            throw new Exception('Surname - '. $e->getMessage());
        }
    }

    public function isScore($str) {
        $score = (int) $str;
        if (is_int($score)) {
            if ($score <= 300) {
                return true;
            }
        }
        throw new Exception('Score');
    }

    public function isGroup($str) {
        try {
            $this->strLen(1, 10, $str);
            $this->isLettersAndNumbersOnly($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('group - '. $e->getMessage());
        }
    }

    public function isGender($str) {
        try {
            $this->isBool($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('gender - '. $e->getMessage());
        }
    }

    public function isRegional($str) {
        try {
            $this->isBool($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('regional - '. $e->getMessage());
        }
    }

    public function isMonth($str) {
        try {
            $this->isNumbersOnly($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('month - '. $e->getMessage());
        }
    }

    public function isDay($str) {
        try {
            $this->isNumbersOnly($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('day - '. $e->getMessage());
        }
    }

    public function isYear($str) {
        try {
            $this->isNumbersOnly($str);

            return true;
        } catch (Exception $e) {
            throw new Exception('year - '. $e->getMessage());
        }
    }
}