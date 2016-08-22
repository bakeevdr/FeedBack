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
			<td><?php echo (($item->id ===1)?JHtml::_('grid.id', $i, $item->id):''); ?></td>
			<td>
				<?php if ($item->id ===1) { ?>
					<a href="<?php echo JRoute::_('index.php?option=com_feedback&task=project.edit&id='.$item->id);?>">
						<?php echo $item->name; ?>
					</a>
				<?php }
					Else
						echo $item->name; ?>
			</td>
			<td><?php echo $item->wwwsite; ?></td>
			<td class="small hidden-phone hidden-tablet">
				<?php if (!empty($item->linked_user)) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_users&task=user.edit&id=' . $item->manager_id); ?>"><?php echo $item->linked_user; ?></a>
					<div class="small"><?php echo $item->email; ?></div>
				<?php endif; ?>
			</td>
			<td><?php echo $item->description; ?></td>
		</tr>
	<?php endforeach; ?>