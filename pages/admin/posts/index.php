<?php
$posts = App::getInstance()->getTable('Post')->all();

?>


<h1>COUCOU COMING PTRUEL</h1>


<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>TITRE</td>
			<td>ACTION</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post) : ?>
		<tr>
			
		<td><?= $post->id; ?></td>
		<td><?= $post->titre; ?></td>
		<td><a href="admin.php?p=posts.single"><button>edit</button></a></td>
			
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>