<?php
defined('_JEXEC') or die('Restricted access');

class FeedBackModelFeedBacks extends JModelList{
	
		public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id',
				'project', 
				'title', 
				'hide', 
				'status', 
				'type', 
				
			);
		}
		parent::__construct($config);
	}
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query	->select('*')
				->from('#__feedback FB');
			
		$query	->select('FP.name as project_name')
				->leftJoin('#__feedback_project AS FP ON FP.id = FB.project_id');
				
		$query	->select('FT.name as type_name')
				->leftJoin('#__feedback_type AS FT ON FT.id = FB.type_id');
				
		$query	->select('FS.name as status_name')
				->select('FS.color as status_color')
				->leftJoin('#__feedback_status AS FS ON FS.id = FB.status_id');
				
		//---- Сортировка
		 $orderCol	= $this->state->get('list.ordering');
		 $orderDirn	= $this->state->get('list.direction');
		 //$query->order($db->Escape($orderCol.' '.$orderDirn));
		
		//---- Фильтр / поиск
		$filter_search = $this->getState('filter.search');
		if (!empty($filter_search)){
			if (stripos($filter_search, 'id:') === 0){
				$query->where($db->quoteName('FB.id') . ' = ' . (int) substr($filter_search, 3));
			}
			else{
				$filter_search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($filter_search), true) . '%'));
				$query->where('(FB.title LIKE ' . $filter_search . ' )');
			}
		}
		//---- Фильтр / приватные сообщения
		$filter_hide = $this->getState('filter.hide');
		if ($filter_hide !== '')
			$query->where($db->quoteName('FB.hide') . ' = ' . (int) $filter_hide);
		
		//---- Фильтр / Статус рассмотрения
		$filter_status = $this->getState('filter.status');
		if ($filter_status !== '')
			$query->where($db->quoteName('FB.status_id') . ' = ' . (int) $filter_status);
		
		//---- Фильтр / Проект
		$filter_project = $this->getState('filter.project');
		if ($filter_project !== '')
			$query->where($db->quoteName('FB.project_id') . ' = ' . (int) $filter_project);
		
		//---- Фильтр / Видд обращения
		$filter_type = $this->getState('filter.type');
		if ($filter_type !== '')
			$query->where($db->quoteName('FB.type_id') . ' = ' . (int) $filter_type);
		
		return $query;
	}/**/
	
	protected function getStoreId($id = '')
	{
		$id.= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.hide');
		$id .= ':' . $this->getState('filter.status');
		$id .= ':' . $this->getState('filter.project');
		$id .= ':' . $this->getState('filter.type');
		return parent::getStoreId($id);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		//---- Фильтры
		$this->setState('filter.search',	$this->getUserStateFromRequest($this->context . '.filter.search',	'filter_search'));
		$this->setState('filter.hide',		$this->getUserStateFromRequest($this->context . '.filter.hide', 	'filter_hide'));
		$this->setState('filter.status',	$this->getUserStateFromRequest($this->context . '.filter.status',	'filter_status'));
		$this->setState('filter.project',	$this->getUserStateFromRequest($this->context . '.filter.project',	'filter_project'));
		$this->setState('filter.type',		$this->getUserStateFromRequest($this->context . '.filter.type',		'filter_type'));
		parent::populateState('FB.date', 'desc');
	}

}