<?php 
//connect to database 
function database(){
    return new mysqli("localhost","root","","mysql_php_project1");
}