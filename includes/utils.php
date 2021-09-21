<?php

/**
 * Converts localized date format string to jscalendar format
 * Example: $array = array_csort($array,'town','age',SORT_DESC,'name');
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function parse_calendardate($local_format) {
	preg_match("/\(?([^-]{1})[^-]*-([^-]{1})[^-]*-([^-]{1})[^-]*\)/", $local_format, $matches);
	$calendar_format = "%" . $matches[1] . "-%" . $matches[2] . "-%" . $matches[3];
	return str_replace(array("y", "�", "a", "j"), array("Y", "Y", "Y", "d"), $calendar_format);
}


?>
