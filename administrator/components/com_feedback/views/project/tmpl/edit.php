<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
?>

<script type="text/javascript">
  Joomla.submitbutton = function(task)
	{
		if (task == 'Project.cancel' || document.formvalidator.isValid(document.id('Project-form'))) {
			Joomla.submitform(task, document.getElementById('Project-form'));
		}
	}
</script>

<form action="index.php" method="post" name="adminForm" id="Project-form" class="form-validate">
	<div class="row-fluid">
		<div class="span12 form-horizontal">
			<?php 
				echo JHtml::_('bootstrap.startTabSet', 'Project', array('active' => 'display'));
				foreach ($this->form->getFieldsets() as $fieldSet) {
					echo JHtml::_('bootstrap.addTab', 'Project', $fieldSet->name, $fieldSet->label); 
					foreach ($this->form->getFieldset($fieldSet->name) as $field) {
						Echo'<div class="control-group">
								<div class="control-label">'. $field->label.'</div>
								<div class="controls">'. $field->input.'</div>
							</div>';
					}
					echo JHtml::_('bootstrap.endTab');
				}
				echo JHtml::_('bootstrap.endTabSet'); 
			?>
		</div>
		<div>
			<input type="hidden" name="task" value="Projects.edit" />
			<input type="hidden" name="option" value="com_feedback" />
			<input type="hidden" name="view" value="Projects" />
			<input type="hidden" name="layout" value="edit" />
			<input type="hidden" name="id" value="<?php echo $this->item->id?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>