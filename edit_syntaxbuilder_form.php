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
 * The editing form code for this question type.
 * @package    qtype_syntaxbuilder
 * @copyright  2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/question/type/edit_question_form.php');

/**
 * Editing form for the Syntaxbuilder question type
 * @copyright 2024 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * gapfill editing form definition.
 *
 * See http://docs.moodle.org/en/Development:lib/formslib.php for information
 * about the Moodle forms library, which is based on the HTML Quickform PEAR library.
 */
class qtype_syntaxbuilder_edit_form extends question_edit_form {

    /**
     * Name of this question type
     * @return string
     */
    public function qtype() {
        return 'syntaxbuilder';
    }

    /**
     * Add syntaxbuilder specific form fields.
     *
     * @param object $mform the form being built.
     */
    protected function definition_inner($mform): void {
        $mform = $this->form_setup($mform);
/*
        $mform->addElement('html', <<<HTML
<textarea id="syntaxbuilder-input-1" style="display:none">
{
    "meta": {
    "title": "Satz 1",
    "description": "Satz 1",
    "author": "coactum",
    "is_solution": false,
    "is_exam": false,
    "date": 1728933375986,
    "version": "1.0.0",
    "meta_version": "1.6.0"
    },
    "words": [
    {"id": 0, "text": "Annas",      "category_1a": "PRP", "category_1b": "", "category_2": "FEM",     "units": ["Gen", "Sg"],                                                     "constituent": "N"},
    {"id": 1, "text": "Vater",      "category_1a": "COM", "category_1b": "", "category_2": "MASK",    "units": ["Nom", "Sg"],                                                     "constituent": "N"},
    {"id": 2, "text": "hat",        "category_1a": "HV",  "category_1b": "", "category_2": "-",       "units": ["3. Ps", "Sg", "Präs", "Ind", "Akt"],                             "constituent": "V"},
    {"id": 3, "text": "jahrelang",  "category_1a": "ADJ", "category_1b": "", "category_2": "-",       "units": ["-"],                                                             "constituent": "A"},
    {"id": 4, "text": "in",         "category_1a": "-",   "category_1b": "", "category_2": "DAT",     "units": ["-"],                                                             "constituent": "Pr"},
    {"id": 5, "text": "Köln",       "category_1a": "PRP", "category_1b": "", "category_2": "NEUT",    "units": ["Dat", "Sg"],                                                     "constituent": "N"},
    {"id": 6, "text": "gewohnt.",   "category_1a": "VV",  "category_1b": "", "category_2": "NOM|LOK", "units": ["Part"],                                                          "constituent": "V"}
    ],
    "groups": [
    {"id": 0, "text": "NGr", "set": [{"type": "word", "ref": 0}, {"type": "word", "ref": 1}], "is_analytical_to_infinitive": false},
    {"id": 1, "text": "V", "set": [{"type": "word", "ref": 2}, {"type": "word", "ref": 6}], "is_analytical_to_infinitive": false},
    {"id": 2, "text": "PrGr", "set": [{"type": "word", "ref": 4}, {"type": "word", "ref": 5}], "is_analytical_to_infinitive": false},
    {"id": 3, "text": "S", "set": [{"type": "group", "ref": 0}, {"type": "group", "ref": 1}, {"type": "group", "ref": 2}], "is_analytical_to_infinitive": false},
    {"id": 4, "text": "S", "set": [{"type": "group", "ref": 3}, {"type": "word", "ref": 3}], "is_analytical_to_infinitive": false}
    ],
    "relations": [
    {"id": 0, "text": "genattr", "start": {"type": "word", "ref": 0}, "end": {"type": "word", "ref": 1}},
    {"id": 1, "text": "subj", "start": {"type": "group", "ref": 0}, "end": {"type": "group", "ref": 1}},
    {"id": 2, "text": "adverg", "start": {"type": "group", "ref": 2}, "end": {"type": "group", "ref": 1}},
    {"id": 3, "text": "präd", "start": {"type": "group", "ref": 1}, "end": {"type": "group", "ref": 3}},
    {"id": 4, "text": "advang", "start": {"type": "word", "ref": 3}, "end": {"type": "group", "ref": 3}}
    ]
}   
</textarea>
HTML
);
        $mform->addElement('html', '<div id="questiontext" class="qtext syntaxbuilder-viewer-here" syntaxbuilder-data-id=1></div>');*/
        
        $mform->addElement('text', 'syntaxbuilder_sentence', 'Satz', array('size'=>100));
        $mform->setType('syntaxbuilder_sentence', PARAM_TEXT);

        //$mform->addElement('html', '<div id="questiontext" class="qtext" style="display: none" name="questiontext[text]" ></div>');

        $mform->addElement('editor', 'generalfeedback', get_string('generalfeedback', 'question')
                , array('rows' => 10), $this->editoroptions);

        $mform->setType('generalfeedback', PARAM_RAW);
        $mform->addHelpButton('generalfeedback', 'generalfeedback', 'question');

        //$mform->removeelement('questiontext');
        //$mform->addElement('text', 'questiontext', get_string('questiontext', 'question'), array('size'=>100));
/*
        $mform->addElement('text', 'syntaxbuilder_sentence', 'SyntaxBuilder sentence', array('size' => '100'));
        $mform->addRule('syntaxbuilder_sentence', get_string('error'), 'required' , '', 'client');
        $mform->setType('syntaxbuilder_sentence', PARAM_NOTAGS);
*/
    }

    /**
     * Setup form elements that are very unlikely to change
     *
     * @param MoodleQuickForm $mform
     * @return MoodleQuickForm
     */
    protected function form_setup(MoodleQuickForm $mform) : MoodleQuickForm {
        global $PAGE;
        //$PAGE->requires->js_call_amd('qtype_syntaxbuilder/syntaxbuilder-app', 'init');

        $mform->addElement('hidden', 'reload', 1);
        $mform->setType('reload', PARAM_RAW);

        //$mform->removeelement('questiontext');
        //var_dump(htmlspecialchars($mform->getElement('questiontext')->toHtml())); die;
        $mform->removeelement('generalfeedback');
        $mform->removeelement('defaultmark');

        return $mform;
    }

    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);

        if (!empty($question->options)) {
            $question->syntaxbuilder_sentence = $question->options->syntaxbuilder_sentence;
        }

        return $question;
    }
}