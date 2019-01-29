<?php
require_once('model/fields.php');
require_once('model/validate.php');

//Add a cookie that is persistent for 3 years.
if (session_id() == '') {
    $lifetime = 60 * 60 * 24 * 1095;  // 3 years
    session_set_cookie_params($lifetime, '/');
    session_start();
}

// Add fields with optional initial message
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('phone', 'Use 888-555-1234 format.');
$fields->addField('email', 'Must be a valid email address.');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = 'reset';
} else {
    $action = strtolower($action);
}

switch ($action) {
    case 'reset':
        // Reset values for variables
        $first_name = '';
        $last_name = '';
        $phone = '';
        $email = '';

        // Load view
        include 'view/register.php';
        break;
    case 'register':
        // Copy form values to local variables
        $first_name = trim(filter_input(INPUT_POST, 'first_name'));
        $last_name = trim(filter_input(INPUT_POST, 'last_name'));
        $phone = trim(filter_input(INPUT_POST, 'phone'));
        $email = trim(filter_input(INPUT_POST, 'email'));

        // Validate form data
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->phone('phone', $phone);
        $validate->email('email', $email);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/success.php';
        }
		
		// Clean up session ID

        // Delete the cookie for the session
		// Get name of the session cookie
        // Create expiration date in the past
        // Get session params
		
        break;
}
?>