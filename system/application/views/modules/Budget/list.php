<form name="frmFilter" id="frmFilter" method="POST" action="index.php?budget/show">
<input type="hidden" id="sortby" name="sortby" value="<?php echo $sortby ?>" />
<input type="hidden" id="sortorder" name="sortorder" value="<?php echo $sortorder ?>" />
<table class="listView" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
	<tr height="20">
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('year');" />Year 
		<?php 
		if ($sortby=="year") {
		?>
			<img 
			<?php 
			if ($sortby=="year") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('year');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('budgets.catID');" />Expenditure
		<?php 
		if ($sortby=="budgets.catID") {
		?>
			<img 
			<?php 
			if ($sortby=="budgets.catID") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('budgets.catID');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap>
		<a class="listViewThLinkS1" href="javascript: sorting('particularID');" />Particular
		<?php 
		if ($sortby=="particularID") {
		?>
			<img 
			<?php 
			if ($sortby=="particularID") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('particularID');" /> 
		<?php 
		}
		?>
		</a>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('amount');" />Appropriation 
		<?php 
		if ($sortby=="amount") {
		?>
			<img 
			<?php 
			if ($sortby=="amount") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('amount');" /> 
		<?php 
		}
		?>
		</a>
		</div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('sup_amount');" />Supplemental
		<?php 
		if ($sortby=="sup_amount") {
		?>
			<img 
			<?php 
			if ($sortby=="sup_amount") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('sup_amount');" /> 
		<?php 
		}
		?>
		</a>
		</div>
		</td>
		<td scope="col" class="listViewThS1" nowrap><div align="right">
		<a class="listViewThLinkS1" href="javascript: sorting('balance');" />Balance 
		<?php 
		if ($sortby=="balance") {
		?>
			<img 
			<?php 
			if ($sortby=="balance") {
				if ($sortorder=="DESC") {
					echo 'src="images/arrow_down.gif"';
				} else {
					echo 'src="images/arrow_up.gif"';
				}
			}
			?>
			align="absmiddle" border="0" onclick="sorting('balance');" /> 
		<?php 
		}
		?>
		</a>
		</div>
		</td>
		<td scope="col" class="listViewThS1" nowrap width="5%"><div align="right" onclick="hideFilters('searchHandle');" > <img src="images/Search.gif" align="absmiddle" border="0" /><img src="images/advanced_search.gif" id="searchHandle" alt="Basic Search" style="cursor: pointer;" align="absmiddle" border="0"/></div></td>
	</tr>
	<tr height="20" id="filters" style="display: none">
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<input type="text" name="year" id="year" size="8"  maxlength="4" value="<?php echo $year ?>" onkeypress="return keyRestrict1(event, 0);"/>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="catID" id="catID">
		<option value="">------------------------</option>
		<?php 
        foreach ($expenditures->result() as $row) {
        	if ($catID==$row->catID)
            	echo '<option value="'.$row->catID.'" selected>'.$row->catName.'</option>';
            else 
            	echo '<option value="'.$row->catID.'">'.$row->catName.'</option>';
        }
        ?>
		</select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">
		<select name="particularID" id="particularID">
		<option value="">-------------------------</option>
		<?php 
        foreach ($particulars->result() as $row) {
        	if ($particularID==$row->particularID)
            	echo '<option value="'.$row->particularID.'" selected>'.$row->particular.'</option>';
            else 
            	echo '<option value="'.$row->particularID.'">'.$row->particular.'</option>';
        }
        ?>
		</select>
		</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp;</td>
		<td scope="row" class="evenListRowS1" nowrap  class="listViewPaginationTdS1">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="20" height="1" class="listViewHRS1"></td>
	</tr>
	
	<?php
		$atotal = 0;
		$etotal = 0;
		$btotal = 0;
		$stotal = 0;
		$dtotal = 0;
	if ($records->num_rows()) {
		foreach($records->result() as $row) {
	?>
		<!-- Start of students Listing -->
    	<tr onmouseover="setPointer(this, '0', 'over', '#ffffff', '#ebebed', '');" onmouseout="setPointer(this, '1', 'out', '#ffffff', '#ebebed', '');" onmousedown="setPointer(this, '0', 'click', '#ffffff', '#ebebed', '');" height="20">
    	    
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1"><?php echo $row->year ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
    		align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1">
    		<?php
			foreach($expenditures->result() as $cat) {
				if($cat->catID==$row->catID)
				echo $cat->catName;
				}
			?>
    		</a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="left" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1"><?php echo $row->particular ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="right" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1"><?php echo number_format($row->amount, 2) ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="right" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1"><?php echo number_format($row->sup_amount,2) ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="right" bgcolor="#fdfdfd" valign="top"><span sugar="sugar0b"><a href="index.php?budget/view/<?php echo $row->budgetID ?>" class="listViewTdLinkS1"><?php echo number_format($row->balance,2) ?></a></span></td>
    		
    		<td scope="row" class="oddListRowS1" bgcolor="#ffffff" 
            align="left" bgcolor="#fdfdfd" valign="top">&nbsp;</td>
    		
    	</tr>
    	<tr>
    		<td colspan="20" height="1" class="listViewHRS1"></td>
    	</tr>
    	<!-- End of student Listing -->
	<?php
		$atotal += $row->amount;
		$btotal += $row->balance;
		$stotal += $row->sup_amount;
		}
	} else {
	?>
    	<tr>
    		<td colspan="5" class="oddListRowS1">
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
		<td height="20" class="oddListRowS1" bgcolor="#ffffff"  ><b>&nbsp;</b>	</td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b>&nbsp;</b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b>TOTAL :</b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($atotal,2); ?></b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($stotal,2); ?></b></td>
		<td align="right" class="oddListRowS1" bgcolor="#ffffff" ><b><?php echo number_format($btotal,2); ?></b></td>
	</tr>
	<tr>
		<td height="20" scope="col" class="listViewThS1" colspan="3" nowrap>
		<?php 
		$pagination = $this->pagination->create_links(); 
		
		if ($pagination) {
			echo "Page: ".$pagination."&nbsp;&nbsp;| &nbsp; ";			
		}
		
		echo "Total Records: ".number_format($ttl_rows,0);
		?>
		</td>
		
		<td height="20" colspan="4"  scope="col" align="right" class="listViewThS1" nowrap>
		
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
		<input type="image" class="button" name="cmdPrint" id="cmdPrint" value="Print" src="images/printer.png" onclick="return popUp('index.php?budget/printlist/<?php echo $this->uri->segment(3); ?>');"/>
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
	document.getElementById('year').value="";
	document.getElementById('particularID').value="";
	document.getElementById('catID').value="";
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
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=600,left = 0,top = 0');");
	return false;
}

<?php
if ($year || $particularID || $catID) {
	echo "hideFilters('searchHandle');";	
} else {
	echo "hideFilters('searchHandle');";
}
?>

</script>