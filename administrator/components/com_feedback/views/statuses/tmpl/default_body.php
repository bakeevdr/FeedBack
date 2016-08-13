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
			<td><span class="FB_status label" style="background-color:<?php echo $item->color; ?>"><?php echo $item->name; ?></span></td>
			<td><?php echo $item->color; ?></td>
		</tr>
	<?php endforeach; ?>