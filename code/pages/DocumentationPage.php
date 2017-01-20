<?php

class DocumentationPage extends Page {

	private static $singular_name = 'Documentation page';
	private static $plural_name = 'Documentation pages';
	private static $description = 'Page with documentation sections';

	private static $has_many = array(
		'Sections' => 'DocumentationSection'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$sectionsConfig = GridFieldConfig_RecordEditor::create();
		if(class_exists('GridFieldOrderableRows')){
			$sectionsConfig->addComponent(new GridFieldOrderableRows());
		}
		$fields->addFieldToTab('Root.Sections', new GridField('Sections', _t('DocumentationSection.PLURAL_NAME', 'Sections'), $this->Sections(), $sectionsConfig));

		return $fields;
	}

}

class DocumentationPage_Controller extends Page_Controller {

}