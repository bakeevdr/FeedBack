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
			<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
			<td>
				<a href="<?php echo JRoute::_('index.php?option=com_feedback&task=project.edit&id='.$item->id);?>">
					<?php echo $item->name; ?>
				</a>
			</td>
			<td><?php echo $item->wwwsite; ?></td>
			<td><?php echo $item->contractor; ?></td>
			<td><?php echo $item->description; ?></td>
		</tr>
	<?php endforeach; ?>