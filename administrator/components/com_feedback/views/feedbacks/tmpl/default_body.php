<?php
// Права доступа
defined('_JEXEC') or die('Restricted Access');
?>
<?php 
	foreach($this->items as $i => $item): ?>
		<tr class="row<?php echo $i % 2; ?>">
			<td><?php echo $item->id; ?></td>
			<td class="small center">
				<div class="icon-eye<?php echo ($item->hide==1)?'-2" style="color: red;':''; ?>" ></div>
				<span class="FB_status label" style="background-color:<?php echo $item->status_color; ?>"><?php echo $item->status_name; ?></span>
				<div><?php echo $item->type_name; ?></div>
			</td>
			<td><?php echo $item->project_name; ?></td>
			<td><?php echo $item->category_id; ?></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td><?php echo $item->date; ?></td>
		</tr>
	<?php endforeach; ?>