<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">

             <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<style>

</style>
<body>
	
		<div><h1 style="color: red;text-align: center">FLIGHT NOTIFICATIONS</h1></div>
	<form method="post" action="">
		
	
			<table>
				<tr>
		<table border="1" class="table table-bordered table-striped table-primary">
		<thead>
		<tr>
		<th> Flight Name</th>
		<th>Notification</th>
		<th> Date</th>
		<th>Action</th>
		<th>Action</th>
		
</thead></tr>
<?php
if($n->num_rows()>0)
{
	foreach($n->result() as $row)
{
?>
<tr>

<td><?php echo $row->cname;?></td>
<td><?php echo $row->notification;?></td>
<td><?php echo $row->currentdate?></td>
<input type="hidden" name="n_id" value="<?php echo $row->n_id;?>">

 <td><a href="<?php echo base_url()?>main/adminupdate/<?php echo $row->n_id;?>">edit</a> 
 </td>
<td><a href="<?php echo base_url()?>main/deletenotification/<?php echo $row->n_id;?>">delete</a>
 </
</tr>
<?php
}
}

    ?>
</table>
</fieldset>
</form>
</body>
</html>