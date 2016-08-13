<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controlleradmin');

class FeedBackControllerProjects extends JControllerAdmin
{
	public function getModel($name = 'Project', $prefix = 'FeedBackModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
}
