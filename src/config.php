<?php 
require_once('./../vendor/autoload.php');
$db = new mysqli("localhost", "root", "", "cms_ss");
require("Post.class.php");
require("User.class.php");
require("Liked.class.php");
$loader = new Twig\Loader\FilesystemLoader("./../src/templates");
$twig = new Twig\Environment($loader);

?>