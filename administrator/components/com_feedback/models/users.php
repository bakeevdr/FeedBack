<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelUsers extends JModelList{
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__feedback_user');
			

		return $query;
	}/**/


}