<?php

class SortGetterHelper {

    public static function getSortArr($sort, $defaultSort = ['score', 0]) {
        if ($sort) {
            return explode('-', $sort);
        }
        return $defaultSort;
    }

}