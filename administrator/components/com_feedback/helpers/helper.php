<?php
defined('_JEXEC') or die;
abstract class FeedbackHelper
{
	public static function addSubmenu() 
	{	
//		JHTML::core();
		$document = JFactory::getDocument();
		$document->addStyleDeclaration(".icon-48-Feedback {background-image: url('../media/Feedback/images/header-logo-flag.gif');}");   //иконка
		//$document->addScript(JURI::root() . "media/Feedback/js/admin.js");
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$db->setQuery("SELECT *
				FROM #__menu
				WHERE
					link LIKE 'index.php?option=com_feedback%'
					AND parent_id != 1
					AND menutype = 'main'
				ORDER BY id");
				
		$current_view = JRequest::getCmd('view', 'control');
		foreach($views = $db->loadObjectList() as $item):
			$view = substr($item -> link,strpos($item -> link,'view=')+5);
			JHtmlSidebar::addEntry(
				JText::_($item -> title),
				$item -> link,
				$view == $current_view
			);
		endforeach;/**/
	}/**/
/*	public static function getActions($assetName = 'component', $id = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;
		
		$actions = array(
			'core.manage', 
			'core.admin', 
			'core.create', 
			'core.edit', 
			'core.delete'
		);
		if ($assetName == 'component')
			$assetName = 'com_feedback';
		Else 
			$assetName = 'com_feedback.'.$assetName.'.'.$id;
		
		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}
		return $result;
	}/**/

}