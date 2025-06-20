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
 * Syntaxbuilder question type upgrade code.
 *
 * @package    qtype_syntaxbuilder
 * @copyright  2024 - 2025 coactum GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Upgrade code for the syntaxbuilder question type.
 * @param int $oldversion the version we are upgrading from.
 */
function xmldb_qtype_syntaxbuilder_upgrade($oldversion = 0) {
    /*
    global $DB;

    $dbman = $DB->get_manager();
    if ($oldversion < 2024 - 2025121607) {
        if (!$dbman->table_exists('question_syntaxbuilder_options')) {
            $table = new xmldb_table('question_syntaxbuilder_options');
            $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
            $table->add_field('question', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'id');
            $table->add_field('syntaxbuilder_sentence', XMLDB_TYPE_TEXT, null, null, null, null, null, 'question');

            $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
            $dbman->create_table($table);
        }
        // Ayntaxbuilder savepoint reached.
        upgrade_plugin_savepoint(true, 2024 - 2025121606, 'qtype', 'syntaxbuilder');
    }
    */

    return true;
}
