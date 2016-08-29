<?php
	defined('_JEXEC') or die('Restricted Access');
	JHtml::_('bootstrap.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_feedback&view=feedbacks'); ?>" method="post" name="adminForm" id="adminForm">
	<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<?php endif;?>
	<div id="j-main-container" class="<?php Echo (!empty( $this->sidebar))?'span10':'';?>">
		<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
		<?php if (empty($this->items)) : ?>
			<div class="alert alert-no-items">
				<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
		<?php else : ?>
			<table class="table table-striped" id="weblinkList">
				<thead><?php echo $this->loadTemplate('head');?></thead>
				<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
				<tbody><?php echo $this->loadTemplate('body');?></tbody>
			</table>
		<?php endif; ?>
		<div class="pagination">
			<?php echo $this->pagination->getListFooter(); ?>
		</div>
		<div>
			<input type="hidden" name="option" value="com_feedback" />
			<input type="hidden" name="view" value="feedbacks" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
