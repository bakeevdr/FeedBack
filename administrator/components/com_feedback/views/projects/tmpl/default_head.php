<?php
	defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="2%">
		<?php echo JHtml::_('grid.sort',  'id', 'id', 						$this->listDirn, $this->listOrder); ?>
	</th>
	<th width="2%">
		<?php echo JHtml::_('grid.checkall'); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Название проекта', 'name',		$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'WEB адрес', 'wwwsite',			$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Менеджер', 'manager_id',	$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Описание', 'description',		$this->listDirn, $this->listOrder); ?>
	</th>
</tr>