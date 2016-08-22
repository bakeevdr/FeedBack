<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.modellist');

class FeedBackModelProjects extends JModelList{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', 
				'name',
				'description',
				'wwwsite',
				'manager'
			);
		}
		parent::__construct($config);
	}
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('FP.*')
			->from('#__feedback_project as FP ');
			
		$query->select(
				array(
					$db->quoteName('Fu.name', 'linked_user'),
					$db->quoteName('Fu.email')
				)
			)
			->join(
				'LEFT',
				$db->quoteName('#__users', 'Fu') . ' ON ' . $db->quoteName('Fu.id') . ' = ' . $db->quoteName('FP.manager_id')
			);
		  
		//---- Сортировка
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		$query->order($db->Escape($orderCol.' '.$orderDirn));/**/
		
		//---- Фильтр / поиск
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->Escape($search, true).'%');
				$query->where('( name LIKE '.$search.' OR wwwsite LIKE '.$search.')');
			}
		}/**/
		return $query;
	}/**/
	
	protected function populateState($ordering = null, $direction = null)
	{
		//---- Фильтр / поиск
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		parent::populateState('name', 'asc');
		
	}/**/
	
	protected function getStoreId($id = '')
	{
		$id.= ':' . $this->getState('filter.search');
		return parent::getStoreId($id);
	}/**/

}