<?php
require_once('./../vendor/autoload.php');
$loader= new Twig\Loader\FilesystemLoader('./../src/templates');
$db = new mysqli("localhost", "root", "", "cms");
require("Post.class.php");

?>