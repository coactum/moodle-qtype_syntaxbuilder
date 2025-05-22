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

/**
 * The question type class for the syntaxbuilder question type.
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 coactum GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 */
defined('MOODLE_INTERNAL') || die();
global $CFG;
require_once($CFG->libdir . '/questionlib.php');
require_once($CFG->dirroot . '/question/engine/lib.php');

/**
 *
 * The syntaxbuilder question class
 *
 * Load from database, and initialise class
 * @package    qtype_syntaxbuilder
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_syntaxbuilder extends question_type {
    /**
     * Writes to the database, runs from question editing form
     *
     * @param stdClass $question
     * @param stdClass $options
     * @param context_course_object $context
     */
    public function update_question_syntaxbuilder($question, $options, $context) {
        global $DB;
        $options = $DB->get_record('question_syntaxbuilder_settings', array('question' => $question->id));
        if (!$options) {
            $options = new stdClass();
            $options->question = $question->id;
            $options->syntaxbuilder_sentence = '';
            $options->id = $DB->insert_record('question_syntaxbuilder_settings', $options);
        }

        $options->syntaxbuilder_sentence = $question->syntaxbuilder_sentence;

        $options = $this->save_combined_feedback_helper($options, $question, $context, true);
        $DB->update_record('question_syntaxbuilder_settings', $options);
    }
}