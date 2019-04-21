<?php

class UrlHelper {

    public static function toCurrentWithArgs($url, array $args = []) {
        $url .= '?';
        $first = true;

        foreach ($args as $name => $arg) {
            if ($arg) {
                if ($first) {
                    $first = false;
                    $url .= "{$name}={$arg}";
                    continue;
                }
                $url .= "&{$name}={$arg}";
            }
        }

        return $url;
    }

    public static function to($app, $to) {
        return $app . $to;
    }

}