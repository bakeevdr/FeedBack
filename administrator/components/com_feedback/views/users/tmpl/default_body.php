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
			<td><?php echo $item->sys_id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->ip; ?></td>
			<td><?php echo $item->date_ip; ?></td>
		</tr>
	<?php endforeach; ?>