<?php

use Carbon\Carbon;

if (! function_exists('view_navbar_classes')) {
    function view_navbar_classes($viewName) {
        // Some common classes used
        $navbar_transparent = array("fixed-top", "navbar-transparent");
        switch ($viewName) {
            case "login":
                $classes = $navbar_transparent;
                break;
            case "register":
                $classes = $navbar_transparent;
                break;
            case "password.request":
                $classes = $navbar_transparent;
                break;
            default:
                $classes = array();
        }
        
        $classAttr = implode(" ", $classes);
        return $classAttr;
    }
}

if (! function_exists('view_body_class')) {
    function view_body_class($viewName) {
        switch ($viewName) {
            case "login":
                $class = "login-page";
                break;
            case "register":
                $class = "login-page";
                break;
            case "password.request":
                $class = "login-page";
                break;
            default:
                $class = "landing-page";
        }
        
        return $class;
    }
}