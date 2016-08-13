<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.view');

class FeedBackViewProject extends JViewLegacy
{
	protected $form = null;
	protected $item;
	
	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->state	= $this->get('State');
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		$this->addToolBar();
		parent::display($tpl);
	}

	protected function addToolBar()
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('COM_FEEDBACK').': '.JText::_('COM_FEEDBACK_PROJECT').' ('.JText::_('COM_FEEDBACK_NEW').')'
									: JText::_('COM_FEEDBACK').': '.JText::_('COM_FEEDBACK_PROJECT').' ('.JText::_('COM_FEEDBACK_EDIT').')'
									,'FeedBack');
		JToolBarHelper::apply('Project.apply', 'JTOOLBAR_APPLY');
		JToolBarHelper::save('Project.save');
		JToolBarHelper::custom('Project.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		JToolBarHelper::custom('Project.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		JToolBarHelper::cancel('Project.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');/**/
	}
	
}