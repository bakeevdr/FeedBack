<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelStatuses extends JModelList{
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__feedback_status as stat ');
		return $query;
	}/**/


}