<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<style>
	{
	padding:0px;
	margin:0px;
}</style>
	<form method="post" action="<?php echo base_url()?>main/adminupdate">
		
		<?php
	if(isset($user_data))
	{
		foreach($user_data->result() as $row1)
		{
			?>
<fieldset>
<table>
     
	Notification
	<textarea name="notification"><?php echo $row1->notification;?></textarea></br></br>
	<input type="hidden" name="n_id" value="<?php echo $row1->n_id;?>">
	<input type="submit" value="update" name="update">
		<?php
		}
		}?>		
		
					
</table>
</fieldset>	
</form>
</body>
</html>