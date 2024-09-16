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
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/**
 * Syntaxbuilder question definition class.
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_syntaxbuilder_question extends question_graded_automatically_with_countback {

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
}