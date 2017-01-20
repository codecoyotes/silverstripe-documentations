<?php

class DocumentationSection extends DataObject {

	private static $singular_name = 'Section';
	private static $plural_name = 'Sections';

	private static $db = array(
		'Title' => 'Varchar',
		'Slug' => 'Varchar',
		'Content' => 'HTMLText',
		'Sort' => 'Int'
	);

	private static $has_one = array(
		'Page' => 'DocumentationPage',
		'ParentSection' => 'DocumentationSection'
	);

	private static $has_many = array(
		'Sections' => 'DocumentationSection'
	);

	private static $summary_fields = array(
		'ID',
		'Title',
		'Slug'
	);

	private static $default_sort = 'Sort';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeByName('Sort');
		$fields->removeByName('PageID');
		$fields->removeByName('ParentSectionID');

		if($this->exists()){
			$sectionsConfig = GridFieldConfig_RecordEditor::create();
			if(class_exists('GridFieldOrderableRows')){
				$sectionsConfig->addComponent(new GridFieldOrderableRows());
			}
			$fields->addFieldToTab('Root.Sections', new GridField('Sections', _t('DocumentationSection.PLURAL_NAME', 'Sections'), $this->Sections(), $sectionsConfig));
		}

		return $fields;
	}

	public function onBeforeWrite()
	{
		parent::onBeforeWrite();
		$filter = URLSegmentFilter::create();
		$this->Slug = $filter->filter($this->Title);
	}

	public function Link(){
		return $this->Page()->Link('#' . $this->Slug);
	}

	public function AbsoluteLink(){
		return Director::absoluteURL($this->Link());
	}

}