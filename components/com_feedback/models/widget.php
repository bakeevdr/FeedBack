<?php
defined('_JEXEC') or die('Restricted access');

class FeedbackModelWidget extends JModelAdmin
{
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
	
	public function save( $data ){
		$return = parent::save( $data );
		if ($return) {
			$Cookie	= JFactory::getApplication()->input->cookie;
			if ($Cookie->get('fb_ui')&& (mb_strtoupper($data['nicname'])!=='ГОСТЬ')) {
				$db = JFactory::getDBO();
				$db->setQuery("Update #__feedback_user set name ='".$data['nicname']."', name_change = true WHERE id = ".$Cookie->get('fb_ui'));
				$db->execute();
			}
		}
		return $return;
	}
}
?>