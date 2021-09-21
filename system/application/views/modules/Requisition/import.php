<form enctype="multipart/form-data" name="frmEntry" id="frmEntry" method="post" action="index.php?requisition/create" >
<table width="100%" border="0">
  <tr>
    <td>
    <input class="button" name="cmdSave" type="submit" id="cmdSave" value="Process Now"  />
    <input class="button" name="cmdCancel" type="button" id="cmdCancel" value=" Cancel " onclick="window.location='index.php?voter/show'" />
    </td>
    <td align="right" nowrap="nowrap"><span class="required">&bull;</span> Required field</td>
  </tr>
</table>
  
<p>
<table class="tabForm" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th class="dataField" colspan="2" align="left"><h4 class="dataLabel">Import Requisition Order</h4></th>
    </tr>
    <tr>
        <td class="dataLabel" width="150"><slot>Requisition Order File <span class="required">&bull;</span>  </slot></td>
        <td class="dataField">
        <input name="userfile" id="userfile" type="file" class="button" /> 
        </td>
    </tr>
    </table>
   </td>
 </tr>
 </table>
 </p>
 
</form>