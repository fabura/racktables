<?php
/**
 * routing-hack.php
 * Created by JetBrains PhpStorm.
 * User: bulat.fattahov
 * Date: 07.11.12
 * Time: 12:36
 */

    $codeIgniterLocation = "codeigniter";
    $current_request_uri = $_SERVER["REQUEST_URI"];
//    "redirect" to other uri
    $new_request_uri = preg_replace('#^\/?index\.php#i', "$pageno/$tabno", $current_request_uri);
//    clear GET params
    $new_request_uri = preg_replace('#\&?(page|tab)=.+?(&|$)#i', "",$new_request_uri);

    $_SERVER["REQUEST_URI"] = $new_request_uri;
    chdir($codeIgniterLocation);
    include_once ("./index.php");
