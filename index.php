<?php

/**
 *
 * @package local
 * @subpackage notebookstore
 * @copyright 2016 Sebastian Velasquez (sevelasquez@alumnos.uai.cl)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once (dirname ( __FILE__ ) . '/../../../config.php');
// Parameter passed from the url.

// Moodle pages require a context, that can be system, course or module (activity or resource)
$context = context_system::instance();
$PAGE->set_context($context);
// Check that user is logued in the course.
require_login();
if (isguestuser()) {
	die();
}
// Page navigation and URL settings.
$PAGE->set_url(new moodle_url('/local/gif/gif', array('filter'=>$name)));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title('GIF');
// Show the page header
echo $OUTPUT->header();
// Here goes the content

// Show the page footer
echo $OUTPUT->footer();



?>
