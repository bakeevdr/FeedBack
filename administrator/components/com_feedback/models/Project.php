<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelProject extends JModelAdmin{
	public function getTable($type = 'Project', $prefix = 'FeedBackTable', $config = array()){
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true){
		$form = $this->loadForm('com_FeedBack.Project', 'Project', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)){
			return false;
		}
		return $form;
	}
	
	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_FeedBack.edit.Project.data', array());
		if (empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}
	
	public function getItem($pk = null){
		if ($item = parent::getItem($pk)) {
			/*$registry = new JRegistry;
			$registry->loadString($item->paramuser);
			$item->paramuser = $registry->toArray();/**/
		}
		return $item;
	}/**/
	
	/*protected function prepareTable($table)
	{
		$table->version++;
	}/**/
}