<?php
// Права доступа
defined('_JEXEC') or die('Restricted Access');
?>
<?php 
	$db = JFactory::getDBO();
	$query = $db->getQuery(true);
	foreach($this->items as $i => $item): 
	?>
		<tr class="row<?php echo $i % 2; ?>">
			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->project_id; ?></td>
			<td><?php echo $item->category_id; ?></td>
			<td><?php echo $item->type_id; ?></td>
			<td><?php echo $item->status_id; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->hide; ?></td>
			<td><?php echo $item->date; ?></td>
		</tr>
	<?php endforeach; ?>