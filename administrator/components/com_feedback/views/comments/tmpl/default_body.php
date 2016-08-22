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
			<td><?php echo $item->feedback_id; ?></td>
			<td><?php echo $item->parent_id; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->date; ?></td>
			<td><?php echo $item->comment; ?></td>
		</tr>
	<?php endforeach; ?>