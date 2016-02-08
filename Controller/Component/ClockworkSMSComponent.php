<?php
/**
 * ClockworkSMSComponent
 *
 * A component that handles sending SMS via ClockworkSMS.
 *
 * PHP version 5
 *
 * @package		ClockworkSMSComponent
 * @author		Simon YORKSTON
 * @license		MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link		https://github.com/quantum-x/CakePHP-ClockworkSMS
 */

App::uses('Component', 'Controller');

/**
 * ClockworkSMSComponent
 *
 * @package		ClockworkSMSComponent
 */
class ClockworkSMSComponent extends Component {
	public $api_key = false;
	public $from_string  = false;
    protected $request = false;
    protected $results = false;
	protected $errors = false;
    protected $ClockworkSMS = false;

	public function startup(Controller $controller) {
        $this->Controller = $controller;

		$config = array();
		if ($this->api_key !== false) $config['apiKey'] = $this->api_key;
		if ($this->from_string !== false) $config['fromString'] = $this->from_string;

		App::import('Vendor', 'ClockworkSMS.ClockworkSMS', array('file' => 'ClockworkSMS' . DS . 'ClockworkSMS.php'));

		if (!class_exists('ClockworkSMS')) {
			throw new CakeException('Clockwork SMS library is missing or could not be loaded.');
		}

        $this->ClockworkSMS = new ClockworkSMS($config);
	}

    public function getErrors() {
        return $this->errors;
    }
    public function getResults() {
        return $this->results;
    }

	function send($to, $message, $from = false)
	{
		return $this->ClockworkSMS->send($to, $message, $from);
	}

}