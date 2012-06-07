<?php
class AnalyticsComponent extends Component {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $controller = null;

	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = null) {
		if (is_array($settings)) {
			$this->propertyID = $settings['id'];
			unset($settings['id']);
			$this->stack = $settings;
		} else {
			$this->propertyID = $settings;
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