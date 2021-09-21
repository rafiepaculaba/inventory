 <table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value=" Edit " onclick="window.location='index.php?department/edit/<?php echo $rec->deptID; ?>';" />
	<input class="button" name="cmddelete" type="button" id="cmddelete" value="Delete" onclick="deleteRecord('<?php echo $rec->deptID; ?>');" />
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Department</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="150"><slot>Department Name :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->deptName; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Department Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $rec->deptDesc; ?> </slot></td>
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
    reply=confirm("Do you really want to delete this Department?");
    
    if (reply==true)
        window.location='index.php?department/delete/'+id;
}
</script>