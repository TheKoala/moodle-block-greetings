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
 * Callback implementations for Block Greetings
 *
 * @package    block_greetings
 * @copyright  2024 Felipe Lima
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Retorna a string de acordo com a localização do usuário
 * @return string
 */
function block_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'block_greetings');
    }

    $country = $user->country;
    switch ($country) {
        case 'AU':
            $langstr = 'greetinguserau';
            break;
        case 'ES':
            $langstr = 'greetinguseres';
            break;
        case 'FJ':
            $langstr = 'greetinguserfj';
            break;
        case 'NZ':
            $langstr = 'greetingusernz';
            break;
        case 'BR':
            $langstr = 'greetinguserptbr';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'block_greetings', fullname($user));
}
