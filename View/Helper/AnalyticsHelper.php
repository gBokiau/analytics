<?php
class AnalyticsHelper extends AppHelper {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $helpers = array();

	public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
		if (!is_array($settings)) {
			$this->propertyID = $settings;
		} else {
			$this->propertyID = $settings['id'];
			if (array_key_exists('pageView', $settings)) {
				$this->pageView = $settings['pageView'];
			}
			$this->stack = $settings['stack'];
		}
	}

	function writeScript() {
		if($this->propertyID) {
			$pass = array('propertyID'=>$this->propertyID, 'stack'=> $this->stack);
			if (isset($this->pageView))
				$pass['pageView'] = $this->pageView;
			return $this->_View->element('Analytics.analytics', $pass);
		} else {
			return false;
		}
		
	}
}

?>