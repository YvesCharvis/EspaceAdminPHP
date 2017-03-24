<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'] && $_POST['titre'])) {
			$res = $app->getTable('category')->update(
				$_POST['id'], 
				["titre"=>$_POST['titre'], 
				]);
			if ($res) {				
				header("location: admin.php?p=category.single");
				
			}
		}
	}
	$category = $app->getTable('category')->find($_GET['id']);
	if ($category===false) {
		$app->notFound();
	}
	$app->titre = $category->titre;
?>

<form method="post" action="admin.php?p=posts.single&id=<?= $category->id; ?>">
	<input type="hidden" name="id" value="<?= $category->id; ?>">
	<input class="form-control" type="text" name="titre" value="<?= $category->titre; ?>">
	<input class="btn btn-primary" type="submit" name="">
</form>

