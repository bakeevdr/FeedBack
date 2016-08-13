<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FeedbackViewWidgets extends JViewLegacy
{

	function display($tpl = null)
	{
		$app				= JFactory::getApplication();
		$this->params		= $app->getParams();
		$this->FBType		= $this->get('FBType');
		$this->form 		= $this->get('Form');
		$this->FeedBacks 	= $this->get('Items');
		
		$this->form->setFieldAttribute('project_id', 	'default',		JRequest::getVar('p',JRequest::getVar('project_id',1)));
		$this->form->setFieldAttribute('nicname', 		'default',		$this->get('nicname'));
		
		parent::display($tpl);
	}


}