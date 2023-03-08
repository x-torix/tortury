<?php
require_once('./../vendor/autoload.php');
$loader= new Twig\Loader\FilesystemLoader('./../src/templates');
$twig = new Twig\Environment($loader);
$db = new mysqli("localhost", "root", "", "cms");
require("Post.class.php");

?>