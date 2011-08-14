<?php
class AnalyticsComponent extends Object {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $controller = null;

	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		if (count($settings)>1) {
			$this->propertyID = $settings['id'];
			unset($settings['id']);
			$this->stack = $settings;
		} else {
			$this->propertyID = $settings[0];
		}
		$this->controller = &$controller;
		$this->_attachHelper();
	}
	function beforeRender() {
		if (isset($this->pageView)) {
			$this->controller->helpers['Analytics.Analytics']['pageView'] = $this->pageView;
		}
		$this->controller->helpers['Analytics.Analytics']['stack'] = $this->stack;
	}
	function push($what) {
		$this->stack[] = $what;
	}
	function _attachHelper() {
		$this->controller->helpers['Analytics.Analytics'] = array('id'=>$this->propertyID);
	}
}
?>