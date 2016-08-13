<?php
defined('_JEXEC') or die('Restricted access');

class FeedbackViewControl extends JViewLegacy
{
	function display($tpl = null)
	{
		$items  = $this->get('Data');
		$this->assignRef('items',   $items);
		
		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
		
	}
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_FEEDBACK').': Панель управления', 'Feedback');
		if (JFactory::getUser()->authorise('core.admin', 'com_feedback'))
		{
			JToolBarHelper::preferences('com_feedback');
		}
	}
}