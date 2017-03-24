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
	if (isset($_POST['username'], $_POST['password'])){
		if ($auth->login($_POST['username'], $_POST['password'])) {
		echo "connecté";
	}else{
		header('location: index.php?p=login');
		exit();
	}
}
}

if (!$auth->logged()) {
	$app->forbidden();
}
$connect = "Disconnect";

ob_start();
if ($page==='home') {
	require ROOT.'/pages/admin/index.php';

}elseif ($page==='posts.edit'){
	require ROOT.'/pages/admin/posts/index.php';
}

elseif ($page==='posts.single'){
	require ROOT.'/pages/admin/posts/postssingle.php';
}
elseif ($page==='posts.add'){
	require ROOT.'/pages/admin/posts/postsadd.php';
}
elseif ($page==='posts.delete'){
	require ROOT.'/pages/admin/posts/postsdelete.php';
}



$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 