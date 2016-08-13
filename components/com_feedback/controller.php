<?php
defined('_JEXEC') or die ('Restricted access'); 

class FeedbackController extends JControllerLegacy
{
	function display($cachable = false, $urlparams = false)
	{
		JRequest::setVar('view', JRequest::getCmd('view', 'widgets'));
		parent::display($cachable, $urlparams);
	}
} 
?>