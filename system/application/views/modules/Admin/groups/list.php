<form name="frmFilter" id="frmFilter" method="POST" action="index.php?group/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('groupName');" />Group 
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
			align="absmiddle" border="0" onclick="sorting('groupName');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('groupDesc');" />Description 
		<?php 
		if ($sortby=="groupDesc") {
		?>
			<img 
			<?php 
			if ($sortby=="groupDesc") {
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
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('rstatus');" />Status 
		<?php 
		if ($sortby=="rstatus") {
		?>
			<img 
			<?php 
			if ($sortby=="rstatus") {
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
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="groupName" id="groupName" size="15" value="<?php echo $groupName ?>" maxlength="15" onkeypress="return keyRestrict1(event, 6);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="groupDesc" id="groupDesc" value="<?php echo $groupDesc ?>" maxlength="25" onkeypress="return keyRestrict1(event, 6);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="rstatus" id="rstatus">
        <option value="">-------</option>
        <option value="1" <?php if ($rstatus=="1") echo "selected"; ?> >Enabled</option>
        <option value="0" <?php if ($rstatus=="0") echo "selected"; ?> >Disabled</option>
        </select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp; </td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	       
    		<td scope="row" 
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?group/view/<?php echo $row->groupID ?>" class="listViewTdLinkS1"><?php echo $row->groupName ?></a></span></td>
    		
    		<td scope="row"
            class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?group/view/<?php echo $row->groupID ?>" class="listViewTdLinkS1"><?php echo $row->groupDesc ?></a></span></td>
    		
    		<td scope="row" colspan="2"
            class="oddListRowS1" bgcolor="#ffffff" 
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?group/view/<?php echo $row->groupID ?>" class="listViewTdLinkS1">
    		<?php 
	        if ($row->rstatus==1)
	        	echo "Enabled"; 
	        else
	        	echo "<font color='red'>Disabled</font>"; 
	        ?>
    		</a></span></td>
    		
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		}
	} else {
	?>
    	<tr>
    		<td colspan="20" class="oddListRowS1">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tbody>
            	<tr>
            		<td nowrap="nowrap" align="center"><b><i>No result found.</i></b></td>
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
		<td height="20" scope="col" class="listViewThS1">
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination."&nbsp;&nbsp;| &nbsp; ";			
		}
		
		echo "Total Records: $ttl_rows";
		?>
		</td>
		
		<td height="20" colspan="4" scope="col" align="right" class="listViewThS1">
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
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" onclick="return popUp('index.php?group/printlist/<?php echo $this->uri->segment(3); ?>');"/>
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
	document.getElementById('groupName').value="";
	document.getElementById('groupDesc').value="";
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
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=800,height=600,left = 0,top = 0');");
	return false;
}

<?php
if ($groupName || $groupDesc || $rstatus || $rstatus=="0") {
	echo "hideFilters('searchHandle');";	
}
?>
</script>