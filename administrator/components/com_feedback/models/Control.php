<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.modellist');
class FeedbackModelControl extends JModelList
{
	function getData()
	{
		if(empty($this->_data))
		{
			$query ="SELECT *
					FROM #__menu
					WHERE
						link LIKE 'index.php?option=com_feedback%'
						AND parent_id != 1
						AND menutype = 'main'
					ORDER BY id";
			$this->_data = $this->_getList($query);
		}
		return $this->_data;
	}
}