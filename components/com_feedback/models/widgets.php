<?php
defined('_JEXEC') or die('Restricted access');

class FeedbackModelWidgets extends JModelList
{
	public $fb_ui = 0;
	
	public function __construct($config = array())
	{
		parent::__construct($config);
		$user			= JFactory::getUser();
		$db				= JFactory::getDBO();
		$Cookie	= JFactory::getApplication()->input->cookie;
		$this -> fb_ui	=	$Cookie->get('fb_ui');
		if ($user->guest) { // если зашел гость 
			if ($this -> fb_ui === null) {
				$db->setQuery("SELECT `id`, max(`date_ip`) max_date_ip FROM `#__feedback_users` WHERE ip = '".$_SERVER['REMOTE_ADDR']."'  group by `id` ORDER BY max_date_ip DESC"); // ДОБАВИТЬ УСЛОВИЯ по необходимости
				$db->query(); 
				if ($db->loadRow()[0]===null ) { // добавить запись
					$db->setQuery("Insert into #__feedback_users (ip) VALUES ('".$_SERVER['REMOTE_ADDR']."')");
					$db->execute();
					$this -> fb_ui = $db->insertid();
				} else {
					$this -> fb_ui = $db->loadRow()[0];
				}
			} else {	// обновить IP в базе
				$db->setQuery("Select id, ip from #__feedback_users where id='".$this -> fb_ui."'");
				$db->query();
				if ($db->getNumRows() === 0 ) {
					$db->setQuery("Insert into #__feedback_users (ip) VALUES ('".$_SERVER['REMOTE_ADDR']."')");
					$db->execute();
					$this -> fb_ui = $db->insertid();
				} else { // обновить IP
					$db->setQuery("Update #__feedback_users set ip ='".$_SERVER['REMOTE_ADDR']."', date_ip = now() WHERE id = ".$this -> fb_ui);
					$db->execute();
				}
			}
		}else {  // если зашел авторизованный
			$db->setQuery("Select id, ip from #__feedback_users where sys_id='".$user->id."'");
			$db->query(); 
			if ($db->getNumRows () === 0 ) { // добавить запись
				if ($this -> fb_ui === null) {
					$db->setQuery("Insert into #__feedback_users (name,	sys_id, ip) VALUES ('".$user->name."',	'".$user->id."','".$_SERVER['REMOTE_ADDR']."')");
					$db->execute();
					$this -> fb_ui = $db->insertid();
				}
				Else {
					$db->setQuery("Select id, ip from #__feedback_users where id='".$this -> fb_ui."'");
					$db->query();
					if ($db->getNumRows() === 0 ) {
						$db->setQuery("Insert into #__feedback_users (name,	sys_id, ip) VALUES ('".$user->name."',	'".$user->id."','".$_SERVER['REMOTE_ADDR']."')");
						$db->execute();
						$this -> fb_ui = $db->insertid();
					} else { // обновить IP и системный ID 
						$db->setQuery("Update #__feedback_users set ip ='".$_SERVER['REMOTE_ADDR']."', date_ip = now(), sys_id = '".$user->id."' WHERE id = ".$this -> fb_ui);
						$db->execute();
					}
				}
			} Else {
				$this -> fb_ui = $db->loadRow()[0];
				if ( $db->loadRow()[1] === $_SERVER['REMOTE_ADDR']) { // обновить IP в базе если он поменялся
					$db->setQuery("Update #__feedback_users set ip ='".$_SERVER['REMOTE_ADDR']."', date_ip = now() WHERE id = ".$this -> fb_ui);
					$db->execute();
				}
			}
		}
		$this ->fb_un='';
		$Cookie->set('fb_ui', $this -> fb_ui, 0);
	}
		
	function definition_mac() {
		if(PHP_OS == 'Linux'){  
			$macAddr = exec("grep ".$_SERVER['REMOTE_ADDR']." /proc/net/arp | awk '{print $4}'");  
		}
		elseif(PHP_OS == 'WINNT'){
			$ipAddress=$_SERVER['REMOTE_ADDR'];
			$macAddr=false;
			$arp=`arp -a $ipAddress`;
			$lines=explode("\n", $arp);
			
			foreach($lines as $line){
				$cols=preg_split('/\s+/', trim($line));
				if ($cols[0]==$ipAddress){ $macAddr=$cols[1]; }
			}
		};
		return $macAddr; 
	}

	
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm('', 'widget', array('control' => 'jform', 'load_data' => true));
		if ( empty( $form ) ) {
			return false;
		}
		return $form;
	}/**/

	public function getTable( $type = 'Feedback', $prefix = 'Table', $config = array() )
	{
		return JTable::getInstance( $type, $prefix, $config );
	}
	
	function getFBType (){
		$db = JFactory::getDBO();
		$db->setQuery("select id, name from #__feedback_type order by id");
		$item[] =  array("id" => "0","name" => "Все типы",);
		$item  = array_merge($item, $db->loadAssocList());
		return $item;
	}
	
	function getNicname (){
		$db				= JFactory::getDBO();
		$db->setQuery("Select name from #__feedback_users where id='".$this -> fb_ui."'");
		$user = $db->loadAssocList();
		if (isset($user[0]['name']))
		return $user[0]['name'];
	}
	
	protected	function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query	->select('fb.*')
				->from('#__feedback as fb')
				->Where('fb.hide = 0')
				->Where('fb.project_id = '.JRequest::getVar('p',JRequest::getVar('project_id',1)));/**/
			
		$query	->select('(SELECT count(id) FROM `#__feedback_vote` WHERE `status`= 1  and feedback_id = fb.id) void_up')
				->select('(SELECT count(id) FROM `#__feedback_vote` WHERE `status`= -1 and feedback_id = fb.id) void_down');/**/
			
		$query	->select('fbv.status void_user') 
				->leftJoin('#__feedback_vote as fbv on fbv.feedback_id = fb.id and fbv.user_id=11');/**/
				
		$query	->select('fbs.name status')
				->select('fbs.color statuscolor')
				->innerJoin('#__feedback_status as fbs on fbs.id = fb.status_id');/**/
				
		$query	->order('id','desc');
		return $query;
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		$this->setState('list.limit', 0);
	}
}
?>