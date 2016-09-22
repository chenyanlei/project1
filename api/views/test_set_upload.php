<html>

<form action="/upload/set_upload" method="post" enctype="multipart/form-data">
<br />token:<br />
  <input type='text' name='token' id='token' value='<?=$token?>' size='100' /><br />
  <input type='text' name='type' id='type' value='0' size='100' /><br />
  <input type='text' name='pid' id='pid' value='1' size='100' /><br />
<br />file:<br />
  <input type='file' name='data' id='data' /><br /><br />
  <input type='submit' value='Upload' />
</form>

</html>
