<?php
defined('_JEXEC') or die;
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
class JFormFieldProject extends JFormFieldList
{
	protected $type = 'Project';
	
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		  
		$query->select('*');
		$query->from('#__FeedBack_Project');
		
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages){
			foreach($messages as $message) {
				$options[] = JHtml::_('select.option', $message->id, $message->name);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}