<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FeedBackViewStatuses extends JViewLegacy
{
	
	function display($tpl = null)
	{
		$this->items 		= $items = $this->get('Items');;

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		/**/
		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_FEEDBACK').': '.JText::_('COM_FEEDBACK_STATUSES'), 'FeedBack');
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton('Custom', '<a class="btn btn-small" href="index.php?option=com_feedback"><span class="icon-tools"> </span>Панель управления</a>');
		
	}
}