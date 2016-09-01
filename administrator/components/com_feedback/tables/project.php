<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class FeedBackTableProject extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__feedback_project', 'id', $db);
	}
	
	public function bind( $array, $ignore = '' )
	{
		if (isset($array['types']) && is_array($array['types'])){
			$types = new JRegistry;
			$array['types'] = (string)$types->loadArray($array['types']);
		}
		
		return parent::bind( $array, $ignore );
	}
	
}