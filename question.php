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
 * Syntaxbuilder question definition class. Mainly about runtime
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 - 2025 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/**
 * Syntaxbuilder question definition class.
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 - 2025 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_syntaxbuilder_question extends question_graded_automatically_with_countback {

    /**
     * Feedback when the response is entirely correct
     * @var string
     */
    public $syntaxbuilder_sentence;

    /**
     * Communicate with the ng-syntaxbuilder.js script
     * @return void
     */
    public function initjs() {
        global $PAGE;
        $PAGE->requires->js_call_amd('qtype_syntaxbuilder/syntaxbuilder-app', 'init');
    }

    /**
     * @inheritDoc
     */
    public function compute_final_grade($responses, $totaltries) {
    }
    
    /**
     * @inheritDoc
     */
    public function get_validation_error(array $response) {
    }
    
    /**
     * @inheritDoc
     */
    public function grade_response(array $response) {
    }
    
    /**
     * @inheritDoc
     */
    public function get_correct_response() {
    }
    
    /**
     * @inheritDoc
     */
    public function get_expected_data() {
        return array('syntaxbuilder' => PARAM_TEXT); //PARAM_RAW
    }
    
    /**
     * @inheritDoc
     */
    public function is_complete_response(array $response) {
    }
    
    /**
     * @inheritDoc
     */
    public function is_same_response(array $prevresponse, array $newresponse) {
    }
    
    /**
     * @inheritDoc
     */
    public function summarise_response(array $response) {
    }

    /**
     * Return the question settings that define this question as structured data.
     *
     * @param question_attempt $qa the current attempt for which we are exporting the settings.
     * @param question_display_options $options the question display options which say which aspects of the question
     * should be visible.
     * @return mixed structure representing the question settings. In web services, this will be JSON-encoded.
     */
    public function get_question_definition_for_external_rendering(question_attempt $qa, question_display_options $options) {
        // This is a partial implementation, returning only the most relevant question settings for now,
        // ideally, we should return as much as settings as possible (depending on the state and display options).

        return [
            'syntaxbuilder_sentence' => $this->syntaxbuilder_sentence
        ];
    }
}