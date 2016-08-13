<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelTypes extends JModelList{
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__feedback_type as tp ');
		return $query;
	}/**/


}