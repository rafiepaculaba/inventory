 <table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value=" Edit " onclick="window.location='index.php?vessel/edit/<?php echo $rec->vesselID; ?>';" />
	<input class="button" name="cmddelete" type="button" id="cmddelete" value="Delete" onclick="deleteRecord('<?php echo $rec->vesselID; ?>');" />
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Vessel</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="100"><slot>Vessel Code :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->vesselCode; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Vessel Name :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->vesselName; ?> </slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Status :</slot></td>
        <td class="tabDetailViewDF"><slot>
        <?php 
    	if ($rec->status=='1')
    		echo "Active";
    	else 
    		echo '<font color="red">Inactive</font>'; 
    	?>
         </slot></td>
    </tr>
</table>
</p>


<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete this vessel?");
    
    if (reply==true)
        window.location='index.php?vessel/delete/'+id;
}
</script>