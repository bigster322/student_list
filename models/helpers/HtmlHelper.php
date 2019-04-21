<?php
require_once 'UrlHelper.php';

class HtmlHelper {

    public static function tableTopLabel($name, $currentUrl, $label, array $params) {
        if ($params['sort'][0] == $name) {
            $sortPriority = $params['sort'][1] ? 0 : 1;
            return "<a href=". UrlHelper::toCurrentWithArgs($currentUrl,
                    ['sort' => "{$params['sort'][0]}-{$sortPriority}",
                     'page' => 1,
                     'search' => $params['search']]) .">
                        {$label}
                        <span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span>
                    </a><span class='glyphicon glyphicon-arrow-down' aria-hidden='true'></span>";
        } else {
            return "<a href=". UrlHelper::toCurrentWithArgs($currentUrl, ['sort' => "{$name}-0", 'page' => 1, 'search' => $params['search']]) .">{$label}</a>";
        }
    }

    public static function regInputText($name, $label, $type, $placeholder, $value = '', $error = '') {
        if ($error) {
            if ($error['field'] == $name) {
                $error = 'is-invalid';
            } else $error = '';
        }

        return "<div class=\"form-group\">
                  <label for=\"exampleInputEmail1\">{$label}</label>
                  <input value='{$value}' name=\"{$name}\" type=\"{$type}\" class=\"form-control {$error}\" id=\"\" placeholder=\"{$placeholder}\">
                </div>";
    }

}