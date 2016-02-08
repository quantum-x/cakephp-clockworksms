# cakephp-clockworksms
CakePHP 2.X plugin for Clockwork SMS

## Usage Instructions

- Add to your components list
    App::uses('ClockworkSMSComponent', 'ClockworkSMS.Controller/Component');
    
    or in your $components variable
    
    public $components = array('ClockworkSMS.ClockworkSMS');
    
- Use it (here in the context of a shell)

    $collection = new ComponentCollection();
    $this->ClockworkSMS = new ClockworkSMSComponent($collection);
    $this->ClockworkSMS->startup($this);

    //We've got everything we need, send the text message
    $this->ClockworkSMS->send($this->args[0], $this->args[1]);

