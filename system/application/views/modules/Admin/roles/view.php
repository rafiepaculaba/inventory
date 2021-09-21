<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdedit" type="button" id="cmdedit" value="Edit" onclick="window.location='index.php?role/edit/<?php echo $role->roleID; ?>';" />
	<input class="button" name="cmddelete" type="button" id="cmddelete" value="Delete" onclick="deleteRecord('<?php echo $role->roleID; ?>');" />
  </tr>
</table>  
<p>
<table class="tabDetailView" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
        <th class="tabDetailViewDF" colspan="2" align="left"><h4 class="dataLabel">View Role</h4></th>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="18%"><slot>Name :</slot></td>
        <td class="tabDetailViewDF" width="80%"><slot><?php echo $role->roleName; ?></slot></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><slot>Description :</slot></td>
        <td class="tabDetailViewDF"><slot><?php echo $role->roleDesc; ?> </slot></td>
    </tr>
</table>
</p>


<script language="javascript">
function deleteRecord(id)
{
    reply=confirm("Do you really want to delete this role?");
    
    if (reply==true)
        window.location='index.php?role/delete/'+id;
}
</script>