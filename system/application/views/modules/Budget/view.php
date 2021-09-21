<table width="100%" border="0">
  <tr>
    <td>
    <?php if ($roles['edit']) { ?>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value="  Edit  " onclick="window.location='index.php?budget/edit/<?php echo $rec->budgetID; ?>';" />
    <?php } ?>
    
     <?php if ($roles['delete']) { ?>
    <input class="button" name="cmddelete" type="button" id="cmddelete" value="  Delete  " onclick="deleteRecord('<?php echo $rec->budgetID; ?>');" />
    <?php } ?>
    
    <input class="button" name="cmdview" type="button" id="cmdview" value="  Back to list  " onclick="window.location='index.php?budget/show/';" />
  </tr>
</table>  

<p>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="70%" valign="top">
        	<p>
            <table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
		        <th class="tabDetailViewDL" colspan="4" align="left"><h4 class="dataLabel">Budget Information</h4></th>
		    </tr>
		    <tr>
		        <td class="tabDetailViewDL" width="18%"><slot>Year :</slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo $rec->year?>  </slot></td>
		    </tr>
           <tr>
		        <td class="tabDetailViewDL"><slot>Expenditure : </slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo $rec->catName	?></slot></td>
		    </tr>
		    <tr>
		        <td class="tabDetailViewDL"><slot>Particular :</slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo $rec->particular ?>&nbsp;</slot></td>
		    </tr>
		     <tr>
		        <td class="tabDetailViewDL"><slot>Amount Budget :</slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->amount, 2) ?>&nbsp;</slot></td>
		    </tr>
		     <tr>
		        <td class="tabDetailViewDL"><slot>Balance :</slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->balance, 2) ?>&nbsp;</slot></td>
		    </tr>
		    <tr>
		        <td class="tabDetailViewDL"><slot>Supplimentary Budget :</slot></td>
		        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->sup_amount, 2) ?>&nbsp;</slot></td>
		    </tr>
            </table>
            </p>
        </td>
    </tr>
</table>
</p>

<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete?");
    
    if (reply==true)
        window.location='index.php?budget/delete/'+id;
}

function popUp(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 0,top = 0');");
}

function popUp2(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600,left = 0,top = 0');");
}

function popUp3(URL) 
{
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=480,left = 0,top = 0');");
}
</script>