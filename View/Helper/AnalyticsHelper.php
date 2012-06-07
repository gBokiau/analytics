<?php
class AnalyticsHelper extends AppHelper {
	var $propertyID = null;
	var $pageView = null;
	var $stack = array();
	var $helpers = array();

	function __construct($options) {
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
			$pass = array('plugin'=>'Analytics', 'propertyID'=>$this->propertyID, 'stack'=> $this->stack);
			if (isset($this->pageView))
				$pass['pageView'] = $this->pageView;
			return ClassRegistry::getObject('view')->element('analytics', $pass);
		} else {
			return false;
		}
		
	}
}

?>