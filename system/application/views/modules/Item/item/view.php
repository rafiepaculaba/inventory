
<table width="100%" border="0">
  <tr>
    <td>
    <?php if ($roles['edit']) { ?>
    	<input class="button" name="cmdedit" type="button" id="cmdedit" value="    Edit    " onclick="window.location='index.php?item/edit/<?php echo $rec->itemCode; ?>';" />
    <?php } 
    
    if ($roles['delete']) { ?>
		<input class="button" name="cmddelete" type="button" id="cmddelete" value="   Delete  " onclick="deleteRecord('<?php echo $rec->itemCode; ?>');" />
	<?php } ?>

  </tr>
</table>   

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Item</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Item Code :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->itemCode; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Account Code :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->accountCode; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Type :</slot></td>
        <td class="tabDetailViewDF"><slot>
        <?php if($rec->type=="SSP") {
    			echo "SSP"; 
    		} else {
			  	echo "FOL";
    		}
		?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Category :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->catName; ?></slot></td>
    </tr>
     <tr>
        <td class="tabDetailViewDL" ><slot>Brand :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->brandName; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Item :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->item; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->description; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Unit Cost :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo number_format($rec->unitCost1,2); ?> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Unit of Msr :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->umsr; ?> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Status :</slot></td>
        <td class="tabDetailViewDF"><slot>
        <?php if($rec->status==1) {
    			echo "Active"; 
    		} else {
			  	echo "<font color='Red'><b> Inactive </b></font>";
    		}
		?></slot></td>
    </tr>
</table>
</p>

<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete item code \"<?php echo $rec->itemCode; ?>\"?");
    
    if (reply==true)
        window.location='index.php?item/delete/'+id;
}

</script>