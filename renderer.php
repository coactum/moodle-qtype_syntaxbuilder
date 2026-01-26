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
 * @copyright  2024 - 2025 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Generates the output for syntaxbuilder questions
 *
 * @copyright  2024 - 2025 coactum GmbH
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
        // echo "<pre>";
        // var_dump($qa->get_last_step()->get_user()->username);
        // var_dump($qa->get_question()->id);
        // var_dump($qa->get_slot());
        // die;
        $syntaxbuilder_id = $qa->get_question()->id . '_' . $qa->get_slot();

        $question = $qa->get_question();
        $question->initjs();
        $questiontext = $question->questiontext;
        $syntaxbuilder_sentence = trim($question->syntaxbuilder_sentence);
        $output = "";

        $last_data = $qa->get_last_qt_data();

        $syntaxDataText = '';
        if (isset($last_data['syntaxbuilder'])) {
            $syntaxDataText = $last_data['syntaxbuilder'];
        } else {
            $syntaxData = [
                "meta" => [
                    "title" => "",
                    "description" => "",
                    "author" => "",
                    "is_solution" => false,
                    "is_exam" => true,
                    "date" => time() * 1000,
                    "version" => "1.0.0",
                    "meta_version" => "1.6.0"
                ],
                "groups" => [],
                "relations" => []
            ];

            $words = [];
            $syntaxbuilder_sentence_array = explode(' ', $syntaxbuilder_sentence);

            foreach($syntaxbuilder_sentence_array as $index => $word) {
                $words[] = [
                "id" => $index,
                "text" => $word,
                "category_1a" => '',
                "category_1b" => '',
                "category_2" => '',
                "units" => [],
                "constituent" => ""
                ];
            }

            $syntaxData['words'] = $words;
            $syntaxDataText = json_encode($syntaxData);
        }
        //if 
        //echo "<pre>";
        //var_dump($question->syntaxbuilder_sentence);
        //die;
        //var_dump($qa->get_qt_field_name('syntaxbuilder'));
        //die;
        // q30:2_syntaxbuilder
        //echo "<pre>";
        //var_dump($qa->get_last_qt_data());
        //die;

        //$output = "";
        //$question = $qa->get_question();
        //$question->initjs();
        //$questiontext = $question->questiontext;
        //$output = $questiontext;
        //$output = html_writer::tag('div', ' [SYNTAXBAUER]' . $output.' [/SYNTAXBAUER]', ['class' => 'qtext', 'id' => 'syntaxbuilder-viewer-here']);
        $output .= html_writer::tag('p', $questiontext);

        

        $output .= html_writer::tag(
            'textarea', 
            $syntaxDataText, 
            [
                'style' => 'display: none;', 
                'id' => 'syntaxbuilder-input-' . $syntaxbuilder_id
            ]
        );
        $output .= html_writer::tag(
            'div', 
            '', 
            [
                'class' => 'qtext syntaxbuilder-viewer-here',
                'syntaxbuilder-data-id' => $syntaxbuilder_id,
                'syntaxbuilder-data-output-name' => $qa->get_qt_field_name('syntaxbuilder'),
                'syntaxbuilder-data-readonly' => $options->readonly ? 'true' : 'false',
            ]
        );
        //$output .= html_writer::tag('textarea', '', ['style' => 'display: none;', 'id' => 'syntaxbuilder-output-1', 'name' => $qa->get_qt_field_name('syntaxbuilder') ]);
        if ($options->readonly) {
            $output .= html_writer::tag(
                'div',
                '',
                [
                    'class' => 'syntaxbuilder-download-here',
                    'syntaxbuilder-data-id' => $syntaxbuilder_id,
                    'syntaxbuilder-data-downloadfilename' => $qa->get_last_step()->get_user_fullname() . '-' . $qa->get_last_step()->get_user()->username . '-' . $qa->get_question()->id
                ]

            );
        }
        return $output;
    }
}