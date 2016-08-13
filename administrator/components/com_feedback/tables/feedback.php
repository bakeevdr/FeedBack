<?php
defined( '_JEXEC' ) or die;

class TableFeedback extends JTable
{
	function __construct(&$db )
	{
		parent::__construct('#__feedback', 'id', $db);
	}

	public function bind( $array, $ignore = '' )
	{
		$Cookie	= JFactory::getApplication()->input->cookie;
		$array['user_id']=$Cookie->get('fb_ui');
		$array['status_id']=1;
		return parent::bind( $array, $ignore );
		
	}
}