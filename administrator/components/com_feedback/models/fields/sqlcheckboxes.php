<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

JFormHelper::loadFieldClass('checkboxes');

/**
 * Form Field class for the Joomla Platform.
 * Displays options as a list of check boxes.
 * Multiselect may be forced to be true.
 *
 * @see    JFormFieldCheckbox
 * @since  11.1
 */
class JFormFieldSQLCheckboxes extends JFormFieldCheckboxes
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'sqlcheckboxes';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var    string
	 * @since  3.5
	 */
	protected $layout = 'joomla.form.field.checkboxes';
	
	/**
	 * The query.
	 *
	 * @var    string
	 * @since  3.2
	 */
	protected $query;
	/**
	 * Method to get certain otherwise inaccessible properties from the form field object.
	 *
	 * @param   string  $name  The property name for which to the the value.
	 *
	 * @return  mixed  The property value or null.
	 *
	 * @since   3.2
	 */
	public function __get($name)
	{
		switch ($name)
		{
			case 'keyField':
			case 'valueField':
			case 'translate':
			case 'query':
				return $this->$name;
		}

		return parent::__get($name);
	}

	public function __set($name, $value)
	{
		switch ($name)
		{
			case 'keyField':
			case 'valueField':
			case 'translate':
			case 'query':
				$this->$name = (string) $value;
				break;

			default:
				parent::__set($name, $value);
		}
	}
	 
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return)
		{
			// Check if its using the old way
			$this->query = (string) $this->element['query'];
			$this->keyField   = isset($this->element['key_field']) ? (string) $this->element['key_field'] : 'value';
			$this->valueField = isset($this->element['value_field']) ? (string) $this->element['value_field'] : (string) $this->element['name'];
			$this->translate  = isset($this->element['translate']) ? (string) $this->element['translate'] : false;
			$this->header     = $this->element['header'] ? (string) $this->element['header'] : false;
		}

		return $return;
	}

	protected function getOptions()
	{
		$options = array();

		// Initialize some field attributes.
		$keyF   = $this->keyField;
		$valueF = $this->valueField;
		$header = $this->header;

		// Get the database object.
		$db = JFactory::getDbo();

		// Set the query and get the result list.
		$db->setQuery($this->query);
		$items = $db->loadObjectlist();
		
		$fieldname = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname);
		$options = array();
		
		foreach ($items as $item)
		{
			// Filter requirements
			if ($requires = explode(',', ((isset($item->requires))? (string) $item->requires:null)))
			{
				// Requires multilanguage
				if (in_array('multilanguage', $requires) && !JLanguageMultilang::isEnabled())
				{
					continue;
				}
				// Requires associations
				if (in_array('associations', $requires) && !JLanguageAssociations::isEnabled())
				{
					continue;
				}
			}/**/
			
			$value = $item->$keyF;
			$text = $item->$valueF;
			
			$checked = (isset($item->checked))? (string) $item->checked:null;
			$checked = ($checked == 'true' || $checked == 'checked' || $checked == '1');

			$selected = (isset($item->selected))? (string) $item->selected:null;
			$selected = ($selected == 'true' || $selected == 'selected' || $selected == '1');

			$tmp = array(
					'value'    => $value,
					'text'     => JText::alt($text, $fieldname),
					'class'    => (isset($item->class))? (string) $item->class:null,
					'selected' => ($checked || $selected),
					'checked'  => ($checked || $selected),
				);

			$tmp['onclick']  = (isset($item->onclick))? (string) $item->onclick:null;
			$tmp['onchange']  = (isset($item->onchange))? (string) $item->onchange:null;

			$options[] = (object) $tmp;
		}

		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
	
}
