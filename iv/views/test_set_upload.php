<html>

<form action="/upload/set_upload" method="post" enctype="multipart/form-data">
<br />token:<br />
  <input type='text' name='token' id='token' value='<?=$token?>' size='100' /><br />
<br />file:<br />
  <input type='file' name='data' id='data' /><br /><br />
  <input type='submit' value='Upload' />
</form>

</html>
