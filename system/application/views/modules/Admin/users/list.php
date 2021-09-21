<form name="frmFilter" id="frmFilter" method="POST" action="index.php?user/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('lastName');" />Name
		<?php 
		if ($sortby=="lastName") {
		?>
			<img 
			<?php 
			if ($sortby=="lastName") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('lastName');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('userName');" />Username 
		<?php 
		if ($sortby=="userName") {
		?>
			<img 
			<?php 
			if ($sortby=="userName") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('groupName');" />User Group 
		<?php 
		if ($sortby=="groupName") {
		?>
			<img 
			<?php 
			if ($sortby=="groupName") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('isAdmin');" />Administrator 
		<?php 
		if ($sortby=="isAdmin") {
		?>
			<img 
			<?php 
			if ($sortby=="isAdmin") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('users.rstatus');" />Status 
		<?php 
		if ($sortby=="users.rstatus") {
		?>
			<img 
			<?php 
			if ($sortby=="users.rstatus") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="center">
		<a class="listViewThLinkS1" href="javascript: sorting('sessionID');" />Online 
		<?php 
		if ($sortby=="sessionID") {
		?>
			<img 
			<?php 
			if ($sortby=="sessionID") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" /> 
		<?php 
		}
		?>
		</a>
		</div>
		</td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="lastName" id="lastName" size="20" value="<?php echo $lastName ?>" maxlength="15" onkeypress="return keyRestrict1(event, 12);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="userName" id="userName" value="<?php echo $userName ?>" maxlength="25" onkeypress="return keyRestrict1(event, 6);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="groupID" id="groupID">
		<option value="">-----------------</option>>
		<?php 
		foreach ($groups->result() as $row) {
			if ($groupID == $row->groupID) 
				echo "<option value='$row->groupID' selected>$row->groupName</option>";
			else 
				echo "<option value='$row->groupID'>$row->groupName</option>";
		}
		?>
		</select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="isAdmin" id="isAdmin">
        <option value="">-------</option>
        <option value="1" <?php if ($isAdmin=="1") echo "selected"; ?> >Yes</option>
        <option value="0" <?php if ($isAdmin=="0") echo "selected"; ?> >No</option>
        </select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="rstatus" id="rstatus">
        <option value="">-------</option>
        <option value="1" <?php if ($rstatus=="1") echo "selected"; ?> >Active</option>
        <option value="0" <?php if ($rstatus=="0") echo "selected"; ?> >Inactive</option>
        </select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		&nbsp;
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		&nbsp;
		</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if (!empty($records)) {
		$ctr = 0;
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	       
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b">
            <a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1"><?php echo $row->lastName.", ".$row->firstName." ".$row->middleName ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1"><?php echo $row->userName ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1"><?php echo $row->groupName ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1">
    		
    		<?php 
    			if ($row->isAdmin)
    				echo "Yes";
    			else
    				echo "No";
    		?>
    		
    		</a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1">
    		<?php 
	        if ($row->rstatus==1)
	        	echo "Active"; 
	        else
	        	echo "<font color='red'>Inactive</font>"; 
	        ?>
    		</a></span>
    		</td>
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="center" valign="top"><span sugar="sugar0b"><a href="index.php?user/view/<?php echo $row->userID ?>" class="listViewTdLinkS1">
    		<?php 
	        if ($row->sessionID!="")
	        	echo '<img src="images/check_inline.gif" alt="Online" title="Online" border="0" />'; 
	        else
	        	echo "&nbsp;"; 
	        ?>
    		</a>
    		
    		<?php 
	        if ($row->sessionID!="") {
	        	echo '<img src="images/lock.png" alt="Logout" title="Logout" border="0" onclick="logout_user(\''.$row->userID.'\',\''.$row->userName.'\')" style="cursor: pointer;" />'; 
	        }
	        ?>
    		
    		</span>
    		</td>
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="center" valign="top">&nbsp;</td>
    		
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		$ctr++;
		}
	} else {
	?>
    	<tr>
    		<td colspan="20" class="oddListRowS1">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tbody>
            	<tr>
            		<td nowrap="nowrap" align="center"><b><i>No results found.</i></b></td>
            	</tr>
            	</tbody>
            	</table>
    		</td>
    	</tr>
	<?php
	}
	?>
	
	<tr>
		<td colspan="20" class="listViewHRS1"></td>
	</tr>
	<tr>
		<td height="20" colspan="2" scope="col" class="listViewThS1">
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination."&nbsp;&nbsp;| &nbsp; ";			
		}
		
		echo "Total Records: $ttl_rows";
		?>
		</td>
		
		<td height="20" colspan="5" scope="col" align="right" class="listViewThS1">
		<div align="right">
		Records/Page
		<select name="limit" id="limit" class="button" onchange="changeDisplay();">
        <option value="25" <?php if ($limit==25) echo "selected"; ?>>25</option>
        <option value="50" <?php if ($limit==50) echo "selected"; ?>>50</option>
        <option value="75" <?php if ($limit==75) echo "selected"; ?>>75</option>
        <option value="100" <?php if ($limit==100) echo "selected"; ?>>100</option>
        <option value="125" <?php if ($limit==125) echo "selected"; ?>>125</option>
        <option value="150" <?php if ($limit==150) echo "selected"; ?>>150</option>
        <option value="200" <?php if ($limit==200) echo "selected"; ?>>200</option>
         <option value="All" <?php if ($limit=="") echo "selected"; ?>>All</option>
        </select> 
		&nbsp;&nbsp;
		<input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Apply Filters"/>
		<input type="reset" class="button" name="cmdClear" id="cmdClear" value="Clear Filters" onclick="resetFilter();"/>	&nbsp;
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" onclick="return popUp('index.php?user/printlist/<?php echo $this->uri->segment(3); ?>');"/>
		</div>
		</td>
		
		
	</tr>
</tbody>
</table>
</form>

<script language="javascript">

function changeDisplay()
{
	document.getElementById('cmdFilter').value="Apply Filters";
	document.getElementById('frmFilter').submit();
}

function resetFilter()
{
	document.getElementById('lastName').value="";
	document.getElementById('userName').value="";
	document.getElementById('groupID').value="";
	document.getElementById('isAdmin').value="";
	document.getElementById('rstatus').value="";
	document.getElementById('frmFilter').submit();
}

function sorting(fld)
{
	if (document.getElementById('sortby').value==fld) {
		if (document.getElementById('sortorder').value=="ASC") {
			document.getElementById('sortorder').value = "DESC";
		} else {
			document.getElementById('sortorder').value = "ASC";
		}
	} else {
		document.getElementById('sortby').value	   = fld;
		document.getElementById('sortorder').value = "ASC";
	}
	
	document.getElementById('frmFilter').submit();
}

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=500,left = 0,top = 0');");
	return false;
}

function logout_user(id,name) 
{
	reply = confirm("Are you sure you want to lock/logout "+name+"?");
	if (reply==true) {
		$.post(base_url+"index.php?logout/logout_user", { userID: id },
		  function(data){
		    if (parseInt(data)) {
		    	// success
		    	alert("User was successfully logout!");
		    	window.location='index.php?user/show'
		    } else {
		    	// no action taken
				alert("Sorry, can't logout the selected user!");
		    }
		  }, "text");
	}
}

<?php
if ($lastName || $userName || $groupID || $isAdmin || $rstatus) {
	echo "hideFilters('searchHandle');";	
}
?>

</script>