<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace block_greetings\form;
defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/formslib.php');

/**
 * Class message_form
 *
 * @package    block_greetings
 * @copyright  2024 Felipe Lima
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class message_form extends \moodleform {

    /**
     * Define o form
     * @return void
     */
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('textarea', 'message', get_string('yourmessage', 'local_greetings'));
        $mform->setType('message', PARAM_TEXT);

        if (isset($this->_customdata['message'])) {
            $message = $this->_customdata['message'];

            $mform->addElement('hidden', 'id', $message->id);
            $mform->setType('id', PARAM_INT);

            $mform->setDefault('message', $message->message);
        }

        $this->add_action_buttons(true, get_string('submit'));
    }

}
