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
			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->subject_rf; ?></td>
			<td><?php echo $item->full_name; ?></td>
			<td><?php echo $item->genitive_case; ?></td>
		</tr>
	<?php endforeach; ?>