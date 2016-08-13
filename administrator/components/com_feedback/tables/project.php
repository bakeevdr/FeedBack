<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class FeedBackTableProject extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__feedback_project', 'id', $db);
	}

}