<?php
    require_once('TimeDate.php');
    require_once('utils.php');

    
    function calendarSetup($inputField, $button) {
        echo '<script type="text/javascript">';
        //jscal_field
        echo "\nCalendar.setup (\n";
        echo '        {inputField : "'.$inputField.'", ifFormat : "%m/%d/%Y", showsTime : false, button : "'.$button.'", singleClick : true, step : 1}';
        echo "\n);\n";
        echo '</script>';
    }