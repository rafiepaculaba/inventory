<form name="frmFilter" id="frmFilter" method="POST" action="index.php?category/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr>
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('catName');" />Category Name
		<?php 
		if ($sortby=="catName") {
		?>
			<img 
			<?php 
			if ($sortby=="catName") {
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
		
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('catDesc');" />Description
		<?php 
		if ($sortby=="catDesc") {
		?>
			<img 
			<?php 
			if ($sortby=="catDesc") {
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
		
		<td scope="col" class="listViewThS1" nowrap><a class="listViewThLinkS1" href="javascript: sorting('status');" />Status
		<?php 
		if ($sortby=="status") {
		?>
			<img 
			<?php 
			if ($sortby=="catDesc") {
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
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1"><input type="text" name="catName" id="catName" size="35" value="<?php echo $catName ?>" /></td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="status" id="status">
        <option value="">---------</option>
        <option value="1" <?php if ($status=="1") echo "selected"; ?>>Active</option>
        <option value="0" <?php if ($status=="0") echo "selected"; ?>>Inactive</option>
        </select></td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
	?>
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#DEEFFF', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#DEEFFF', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#DEEFFF', '');" height="20">
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff"
    		align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?category/view/<?php echo $row->catID; ?>" class="listViewTdLinkS1"><?php echo $row->catName; ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff"
    		align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?category/view/<?php echo $row->catID; ?>" class="listViewTdLinkS1"><?php echo $row->catDesc; ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" colspan="2"
    		align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?category/view/<?php echo $row->catID; ?>" class="listViewTdLinkS1">
    		<?php if($row->status==1) {
    				echo "Active"; 
    			} else {
				  	echo "<font color='Red'><b> Inactive </b></font>";
    			}
			?></a></span></td>
    		
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
	<?php
		}
	} else {
	?>
    	<tr>
    		<td colspan="20" class="oddListRowS1">
            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
            	<tbody>
            	<tr>
            		<td nowrap="nowrap" align="center">
            		<b><i>No results found.</i></b>
            		</td>
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
		<td height="20" scope="col" class="listViewThS1" nowrap>
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination."&nbsp;&nbsp;| &nbsp; ";			
		}
		
		echo "Total Records: ".number_format($ttl_rows,0);
		?>
		</td>
		
		<td height="20" scope="col" colspan="3" align="right" class="listViewThS1" nowrap>
		<div align="right">
		Number of Records 
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
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" onclick="return popUp('index.php?category/printlist/<?php echo $this->uri->segment(3); ?>');"/>
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
	document.getElementById('catName').value	= "";
	document.getElementById('status').value		= "";
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
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=700,height=500,left = 0,top = 0');");
	return false;
}

<?php
if ($catName || $status || $status=="0") {
	echo "hideFilters('searchHandle');";	
}
?>

</script>