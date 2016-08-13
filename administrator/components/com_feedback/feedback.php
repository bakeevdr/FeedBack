<?php
	defined( '_JEXEC' ) or die( 'Restricted access' );
	if (!JFactory::getUser()->authorise('core.manage', 'com_feedback')) 
	{
		return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	}
	JLoader::register('FeedbackHelper', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php');
	jimport('joomla.application.component.controller');
	$controller = JControllerLegacy::getInstance('Feedback');
	$controller->execute( JRequest::getCmd('task'));
	$controller->redirect();