<?php
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}

$app = App::getInstance();
$auth = new DBAuth($app->getDb());
//connexion utilisateurs via login.php
if ($_POST) {
	if ($auth->login($_POST['username'], $_POST['password'])) {
		echo "connecté";
	}else{
		header('location: index.php?p=login');
		exit();
	}
}

if (!$auth->logged()) {
	$app->forbidden();
}
$connect = "Disconnect";

ob_start();
if ($page==='home') {
	require ROOT.'/pages/admin/index.php';
}elseif ($page==='posts.edit')
	require ROOT.'/pages/admin/posts/index.php';

$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 