<div>Profile</div>

<a href="/logout">Выход</a>

<table>
	<?php 
		foreach ($products as $key => $value){
	?>
		<tr>
			<td><?=$value['id']?></td>
			<td><?=$value['title']?></td>
			<td><?=$value['body']?></td>
		</tr>
	<?php 
		}
	?>
</table>