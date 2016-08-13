<?php
	defined('_JEXEC') or die ('Restricted access'); 
//	jimport('joomla.application.component.controller');
	class FeedbackControllerWidgets extends JControllerLegacy
	{
		function __construct($default = array()) {
			parent::__construct($default);
			$this->registerTask('voidfb','voidfb');
		}
		
		function voidfb() {
			$Cookie	= JFactory::getApplication()->input->cookie;
			$fb_ui = $Cookie->get($name = 'fb_ui', $defaultValue = 0);
			$fb_id = JRequest::getVar('fb_id');
			$fb_mode = JRequest::getVar('mode');
			
			$db				= JFactory::getDBO();
			$db->setQuery("SELECT `id`, `status` FROM `#__feedback_vote` WHERE feedback_id = '".$fb_id."' and user_id='".$fb_ui."' ");
			$db->query(); 
			$Res['clear'] = 0;
			if ($db->getNumRows () === 0 ) {
				$db->setQuery("Insert into #__feedback_vote (feedback_id, user_id, status) VALUES ('".$fb_id."', '".$fb_ui."','".$fb_mode."')");
				$db->execute();
			}
			Else {
				$fb_vote = $db->loadRow();
				if ($fb_vote[1]==$fb_mode) { 
					$db->setQuery("delete from #__feedback_vote where id = ".$fb_vote[0]);
					$db->execute();
					$Res['clear'] = 1;
				}
				else {
					$db->setQuery("Update #__feedback_vote set status =".$fb_mode." where id = ".$fb_vote[0]);
					$db->execute();
				}
			}
			$db->setQuery("SELECT count(id) FROM `fb_feedback_vote` WHERE `status`= 1 and feedback_id = '".$fb_id."'");
			$db->query(); 
			$Res['void_up'] = $db->loadRow()[0];
			$db->setQuery("SELECT count(id) FROM `fb_feedback_vote` WHERE `status`= -1 and feedback_id = '".$fb_id."'");
			$db->query(); 
			$Res['void_down'] =  $db->loadRow()[0];
			Echo json_encode($Res);
		}
		
	}
?>