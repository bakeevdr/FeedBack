<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
//jimport('joomla.application.component.controller');
class FeedbackController extends JControllerLegacy
{
	function display($cachable = false, $urlparams = false) {
		JRequest::setVar('view', JRequest::getCmd('view', 'control'));
		FeedbackHelper::addSubmenu();
		parent::display($cachable, $urlparams);
	}
}