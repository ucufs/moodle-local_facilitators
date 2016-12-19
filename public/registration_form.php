<?php
//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
 
class registration_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;
 
        $mform = $this->_form; // Don't forget the underscore! 
 
        $mform->addElement('text', 'email', get_string('email')); // Add elements to your form
        $mform->setType('email', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('email', 'Please enter email');        //Default value
        //$mform->addElement('button', 'intro', get_string("buttonlabel"));
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', get_string('savechanges'));
            
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}
