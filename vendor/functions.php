<?php

define("BASE_URL", "https://localhost/project/");

function url($var = null)
{
    return BASE_URL . $var;
}
function path($var =null){
    echo "
    <script>
    window.location.replace('https://localhost/project/app/$var')
    </script>
    
    ";
}
function pathwithoutapp($var=null){
    echo" <script>
    window.location.replace('https://localhost/project/$var')
    </script>";
}
function userauth($var=null){
    echo"
    <script>
    window.location.replace(https://localhost/project/$var)
    </script>
    
    ";
}
function filterValidation($input){
    $input  =trim($input);
    $input  =htmlspecialchars($input);
    $input  =strip_tags($input);
    $input  =stripcslashes($input);
    return $input;
}
function auth(){
if (empty($_SESSION)){
    pathwithoutapp('pages-login.php');
}}
define("USER_URL","https://localhost/project/user_panel");
function url_user($var = null){
    return USER_URL . $var;

}