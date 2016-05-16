<?php require_once (dirname ( __FILE__ ) . '/../../../config.php');
// Parameter passed from the url.
$name = required_param('name', home);
// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
// Page navigation and URL settings.
$PAGE->set_url(new moodle_url('/local/gif/gif', array('filter'=>$name)));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('Hello world');
// Show the page header
echo $OUTPUT->header();
// Here goes the content
echo 'Hello world';
// Show the page footer
echo $OUTPUT->footer();

?>
