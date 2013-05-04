<?php
App::uses('Component', 'Controller');
class AnalyticsComponent extends Component {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $controller = null;

	//called before Controller::beforeFilter()
	function initialize(Controller $controller) {
		if (count($this->settings)>1) {
			$this->propertyID = $this->settings['id'];
			unset($this->settings['id']);
			$this->stack = $this->settings;
		} else {
			$this->propertyID = $this->settings[0];
		}
		$controller->helpers['Analytics.Analytics'] = array('id'=>$this->propertyID);
	}
	function beforeRender(Controller $controller) {
		if (isset($this->pageView)) {
			$controller->helpers['Analytics.Analytics']['pageView'] = $this->pageView;
		}
		$controller->helpers['Analytics.Analytics']['stack'] = $this->stack;
	}
	function push($what) {
		$this->stack[] = $what;
	}
}
?>