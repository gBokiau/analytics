<?php
class AnalyticsHelper extends AppHelper {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $helpers = array();

	function __construct($View, $options) {
		if (!is_array($options)) {
			$this->propertyID = $options;
		} else {
			$this->propertyID = $options['id'];
			if (array_key_exists('pageView',$options)) {
				$this->pageView = $options['pageView'];
			}
			$this->stack = $options['stack'];
		}
		return parent::__construct($options);
	}

	function writeScript() {
		if($this->propertyID) {
			$pass = array('propertyID'=>$this->propertyID, 'stack'=> $this->stack);
			if (isset($this->pageView))
				$pass['pageView'] = $this->pageView;
			print_r($pass);
			return $this->_View->element('Analytics.analytics', $pass);
		} else {
			return false;
		}
		
	}
}

?>