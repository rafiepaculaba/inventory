<form name="frmFilter" id="frmFilter" method="POST" action="index.php?role/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $role_sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $role_sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap><a href="javascript: sorting('roleName');" />Role 
		<?php 
		if ($role_sortby=="roleName") {
		?>
			<img 
			<?php 
			if ($role_sortby=="roleName") {
				if ($role_sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('roleName');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap><a href="javascript: sorting('roleDesc');" />Description 
		<?php 
		if ($role_sortby=="roleDesc") {
		?>
			<img 
			<?php 
			if ($role_sortby=="roleDesc") {
				if ($role_sortorder=="DESC") {
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
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="txtname" id="txtname" size="15" value="<?php echo $role_name ?>" maxlength="15" onkeypress="return keyRestrict(event, 6);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="txtdesc" id="txtdesc" value="<?php echo $role_desc ?>" maxlength="25" onkeypress="return keyRestrict(event, 6);" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp; </td>
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
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    	       
    		<td scope="row" 
            <?php if ($ctr%2==0)  { ?>
                class="evenListRowS1" bgcolor="#f9f9f9" 
            <?php } else {?>
                class="oddListRowS1" bgcolor="#ffffff" 
            <?php } ?>
            align="left" valign="top"><span sugar="sugar0b"><a href="index.php?role/view/<?php echo $row->roleID ?>" class="listViewTdLinkS1"><?php echo $row->roleName ?></a></span></td>
    		
    		<td scope="row" colspan="2"
            <?php if ($ctr%2==0)  { ?>
                class="evenListRowS1" bgcolor="#f9f9f9" 
            <?php } else {?>
                class="oddListRowS1" bgcolor="#ffffff" 
            <?php } ?>
    		align="left" valign="top"><span sugar="sugar0b"><a href="index.php?role/view/<?php echo $row->roleID ?>" class="listViewTdLinkS1"><?php echo $row->roleDesc ?></a></span></td>
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
		<td height="20" scope="col" class="listViewThS1">
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination;			
		}
		
		if ($ttl_rows>1)
			echo "Records: $ttl_rows";
		else 
			echo "Record: $ttl_rows";
		?>
		</td>
		
		<td height="20" colspan="5" scope="col" align="right" class="listViewThS1">
		<div align="right">
		Number of Records 
		<select name="limit" id="limit" class="button" onchange="changeDisplay();">
        <option value="25" <?php if ($role_limit==25) echo "selected"; ?>>25</option>
        <option value="50" <?php if ($role_limit==50) echo "selected"; ?>>50</option>
        <option value="75" <?php if ($role_limit==75) echo "selected"; ?>>75</option>
        <option value="100" <?php if ($role_limit==100) echo "selected"; ?>>100</option>
        <option value="125" <?php if ($role_limit==125) echo "selected"; ?>>125</option>
        <option value="150" <?php if ($role_limit==150) echo "selected"; ?>>150</option>
        <option value="200" <?php if ($role_limit==200) echo "selected"; ?>>200</option>
        </select> 
		&nbsp;&nbsp;
		<input type="submit" class="button" name="cmdFilter" id="cmdFilter" value="Apply Filters"/>
		<input type="reset" class="button" name="cmdClear" id="cmdClear" value="Clear Filters" onclick="resetFilter();"/>	&nbsp;
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png"/>
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
	document.getElementById('txtname').value="";
	document.getElementById('txtdesc').value="";
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

</script>