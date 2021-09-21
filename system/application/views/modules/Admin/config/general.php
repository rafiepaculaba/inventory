<form method="post" name="frmConfig" id="frmConfig" action="index.php?config/update_general" onsubmit="return check_form('frmConfig')" >

<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value=" Save " />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?config/'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">*</span> Indicates required field</td>
  </tr>
</table>  

<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">General Settings</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="160"><slot>Intended Position <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="political_position" id="political_position">
        <option value="">-------------------------------------------</option>
        <option value="GOVERNOR" <?php if ($political_position=="GOVERNOR") echo "selected" ?>> GOVERNOR </option>
        <option value="VICE-GOVERNOR" <?php if ($political_position=="VICE-GOVERNOR") echo "selected" ?>> VICE-GOVERNOR </option>
        <option value="CONGRESSMAN" <?php if ($political_position=="CONGRESSMAN") echo "selected" ?>> CONGRESSMAN </option>
        <option value="MAYOR" <?php if ($political_position=="MAYOR") echo "selected" ?>> MAYOR </option>
        <option value="VICE-MAYOR" <?php if ($political_position=="VICE-MAYOR") echo "selected" ?>> VICE-MAYOR </option>
        </select>
        </slot> 
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>Province <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="province" id="province" onchange="getAreas();">
        <option value="">-------------------------------------------</option>
        <option value="SURIGAO DEL NORTE" <?php if ($province=="SURIGAO DEL NORTE") echo "selected" ?>> SURIGAO DEL NORTE </option>
       <!-- <option value="AGUSAN DEL NORTE" <?php if ($province=="AGUSAN DEL NORTE") echo "selected" ?>> AGUSAN DEL NORTE </option>
        <option value="AGUSAN DEL SUR" <?php if ($province=="AGUSAN DEL SUR") echo "selected" ?>> AGUSAN DEL SUR </option>
        <option value="BOHOL" <?php if ($province=="BOHOL") echo "selected" ?>> BOHOL </option>
        <option value="BUKIDNON" <?php if ($province=="BUKIDNON") echo "selected" ?>> BUKIDNON </option>
        <option value="CEBU" <?php if ($province=="CEBU") echo "selected" ?>> CEBU </option>
        <option value="LEYTE" <?php if ($province=="LEYTE") echo "selected" ?>> LEYTE </option>
        <option value="MISAMIS ORIENTAL" <?php if ($province=="MISAMIS ORIENTAL") echo "selected" ?>> MISAMIS ORIENTAL </option>
        <option value="NEGROS OCCIDENTAL" <?php if ($province=="NEGROS OCCIDENTAL") echo "selected" ?>> NEGROS OCCIDENTAL </option>
        <option value="NEGROS ORIENTAL" <?php if ($province=="NEGROS ORIENTAL") echo "selected" ?>> NEGROS ORIENTAL </option>
        <option value="SOUTHERN LEYTE" <?php if ($province=="SOUTHERN LEYTE") echo "selected" ?>> SOUTHERN LEYTE </option>-->
        </select>
        </slot> 
        </td>
    </tr>
    <tr>
        <td class="dataLabel"><slot>District/City/Mun <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <select name="political_area" id="political_area">
        <option value="">-------------------------------------------</option>
        <?php 
        if (count($areas)) {
        	foreach ($areas as $area) {
        		if ($political_area == $area)
	        		echo '<option value="'.$area.'" selected>'.$area.'</option>';
	        	else
	        		echo '<option value="'.$area.'">'.$area.'</option>';
        	}
        }
        ?>
        </select>
        </slot> 
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Political Party <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <input type="text" name="political_party" id="political_party" value="<?php echo $political_party; ?>" size="50" onkeypress="return keyRestrict(event, 6);" />
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Estimated Voters Turnout <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <input type="text" name="estimated_voter_turnout" id="estimated_voter_turnout" value="<?php echo $estimated_voter_turnout; ?>" maxlength="10" size="12" onkeypress="return keyRestrict(event, 0);" /> %
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Target Votes Percentage <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <input type="text" name="tvp" id="tvp" value="<?php echo $tvp; ?>" maxlength="10" size="12" onkeypress="return keyRestrict(event, 0);" /> %
        </slot>
        </td>
    </tr>
    <tr>
        <td class="dataLabel" valign="top"><slot>Election Date <span class="required">*</span></slot></td>
        <td class="dataField">
        <slot>
        <input type="text" name="election_date" id="election_date" maxlength="10" size="12" value="<?php if ($election_date) echo date("m/d/Y",strtotime($election_date)); ?>"  onkeypress="return keyRestrict(event, 8);" /> <img id="jscal_trigger1" align="top" alt="Date Filed" src="images/jscalendar.gif"/>
        </slot>
        </td>
    </tr>
    </table>
</td></tr>
</table>
</p>

</form>

<?php
calendarSetup('election_date', 'jscal_trigger1');
?>

<script language="javascript">
addToValidate('frmConfig','political_position', '', true, 'Intended Position');
addToValidate('frmConfig','political_party', '', true, 'Political Party');
addToValidate('frmConfig','estimated_voter_turnout', '', true, 'Estimated Voter Turnout');
addToValidate('frmConfig','tvp', '', true, 'Target Votes Percentage');
addToValidate('frmConfig','election_date', '', true, 'Election Date');
addToValidate('frmConfig','province', '', true, 'Province');
addToValidate('frmConfig','political_area', '', true, 'District/City/Mun');

function getAreas() 
{
$.post(base_url+"index.php?city/getAreas", { province: $('#province').val() },
  function(data){
    initializeCombo('political_area',"-------------------------------------------");
		for(c = 0; c < data.length; c++){
	    	var y=document.createElement('option');
	    	
		    y.text=data[c];
	    	
			y.setAttribute('value',data[c]);		
			var x=document.getElementById('political_area');
	
			if (navigator.appName=="Microsoft Internet Explorer") {
				x.add(y); // IE only  
			} else {
				x.add(y,null);
			}
		}
  }, "json");
}

</script>