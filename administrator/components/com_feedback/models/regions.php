<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelRegions extends JModelList{
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__feedback_region as rg ');
		return $query;
	}/**/


}