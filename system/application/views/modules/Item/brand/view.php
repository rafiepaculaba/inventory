
<table width="100%" border="0">
  <tr>
    <td>
    <?php if ($roles['edit']) { ?>
    	<input class="button" name="cmdedit" type="button" id="cmdedit" value="    Edit    " onclick="window.location='index.php?brand/edit/<?php echo $rec->brandID; ?>';" />
    <?php } 
    
    if ($roles['delete']) { ?>
		<input class="button" name="cmddelete" type="button" id="cmddelete" value="   Delete  " onclick="deleteRecord('<?php echo $rec->brandID; ?>');" />
	<?php } ?>

  </tr>
</table>   

<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Brand</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="150"><slot>Brand ID :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->brandID; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Brand Name :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->brandName; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->brandDesc; ?></slot></td>
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
    reply=confirm("Do you really want to delete brand \"<?php echo $rec->brandName; ?>\"?");
    
    if (reply==true)
        window.location='index.php?brand/delete/'+id;
}

</script>