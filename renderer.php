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
 * Generates the output for syntaxbuilder questions
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Generates the output for syntaxbuilder questions
 *
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_syntaxbuilder_renderer extends qtype_with_combined_feedback_renderer {

    /**
     * Generate the display of the formulation part of the question shown at runtime
     * in a quiz. 
     *
     * @param question_attempt $qa the question attempt to display.
     * @param question_display_options $options controls what should and should not be displayed.
     * @return string HTML fragment.
     */
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        $output = "";
        $question = $qa->get_question();
        $question->initjs();
        $questiontext = $question->questiontext;
        $output = $questiontext;
        //$output = html_writer::tag('div', ' [SYNTAXBAUER]' . $output.' [/SYNTAXBAUER]', ['class' => 'qtext', 'id' => 'syntaxbuilder-viewer-here']);
        $output = html_writer::tag('textarea', <<<HTML
{
    "words": [
        {"id": 0, "text": "Annas",      "categories": [{"text": "PRP"}, {"text": "FEM"}],     "units": [{"text": "Gen"}, {"text": "Sg"}],                                                     "constituent": "N"},
        {"id": 1, "text": "Vater",      "categories": [{"text": "COM"}, {"text": "MASK"}],    "units": [{"text": "Nom"}, {"text": "Sg"}],                                                     "constituent": "N"},
        {"id": 2, "text": "hat",        "categories": [{"text": "HV"}],                       "units": [{"text": "3. Ps"},{"text": "Sg"},{"text": "Präs"},{"text": "Ind"},{"text": "Akt"}],   "constituent": "V"},
        {"id": 3, "text": "jahrelang",  "categories": [{"text": "ADV"}],                      "units": [],                                                                                    "constituent": "A"},
        {"id": 4, "text": "in",         "categories": [{"text": "DAT"}],                      "units": [],                                                                                    "constituent": "Pr"},
        {"id": 5, "text": "Köln",       "categories": [{"text": "PRP"}, {"text": "NEUT"}],    "units": [{"text": "Dat"}, {"text": "Sg"}],                                                     "constituent": "N"},
        {"id": 6, "text": "gewohnt.",   "categories": [{"text": "VV"}, {"text": "NOM|LOK"}],  "units": [{"text": "Part"}],                                                                    "constituent": "V"}
    ],
    "groups": [
        {"id": 0, "text": "NGr", "set": [{"type": "word", "ref": 0}, {"type": "word", "ref": 1}]},
        {"id": 1, "text": "V", "set": [{"type": "word", "ref": 2}, {"type": "word", "ref": 6}]},
        {"id": 2, "text": "PrGr", "set": [{"type": "word", "ref": 4}, {"type": "word", "ref": 5}]},
        {"id": 3, "text": "S", "set": [{"type": "group", "ref": 0}, {"type": "group", "ref": 1}, {"type": "group", "ref": 2}]},
        {"id": 4, "text": "S", "set": [{"type": "group", "ref": 3}, {"type": "word", "ref": 3}]}
    ],
    "relations": [
        {"id": 0, "text": "genattr", "start": {"type": "word", "ref": 0}, "end": {"type": "word", "ref": 1}},
        {"id": 1, "text": "subj", "start": {"type": "group", "ref": 0}, "end": {"type": "group", "ref": 1}},
        {"id": 2, "text": "adverg", "start": {"type": "group", "ref": 2}, "end": {"type": "group", "ref": 1}},
        {"id": 3, "text": "präd", "start": {"type": "group", "ref": 1}, "end": {"type": "group", "ref": 3}},
        {"id": 4, "text": "advang", "start": {"type": "word", "ref": 3}, "end": {"type": "group", "ref": 3}}
    ]
}
HTML, ['style' => 'display: none;', 'id' => 'syntaxbuilder-input-1']);
        $output .= html_writer::tag('div', '', ['class' => 'qtext syntaxbuilder-viewer-here', 'syntaxbuilder-data-id' => '1']);
        return $output;
    }
}