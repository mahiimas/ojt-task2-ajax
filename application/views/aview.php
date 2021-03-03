<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
</head>
<style>
	*
{
	padding:0px;
	margin:0px;
}
	
table{
	
	padding:20px;
	margin:50px;
	border-collapse:collapse;
	text-align:center;
	}	
</style>
<body>
	

	<form method="post" action="<?php echo base_url()?>main/aview">
	
	
	
		<table border="1">
		<thead>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>username</th>
		<th>phone number</th>
		<th>Address</th>
		<th>District</th>
		<th>Pin</th>
		<th>action</th>
		<th>action</th>
</thead></tr>
<?php
if($n->num_rows()>0)
{
	foreach($n->result() as $row)
{
?>
<tr>
<td><?php echo $row->firstname;?></td>
<td><?php echo $row->lastname;?></td>
<td><?php echo $row->username;?></td>
<td><?php echo $row->phone;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->pin;?></td>


<?php
					if($row->status==1)
					{?>
						<td>Approved</td>
						<td><a href="<?php echo base_url()?>main/rejectdetails/<?php echo $row->loginid;?>">Reject</a></td>
					<?php
					}
					elseif($row->status==2)
					{
						?>
						<td><a href="<?php echo base_url()?>main/approvedetails/<?php echo $row->loginid;?>">Approve</a></td>
						<td>Rejected</td>
						<?php
						}
						else
						{

						?>
					<td><a href="<?php echo base_url()?>main/approvedetails/<?php echo $row->loginid;?>">Approve</a></td>
					<td><a href="<?php echo base_url()?>main/rejectdetails/<?php echo $row->loginid;?>">Reject</a></td>
				</tr>
				







<input type="hidden" name="id" value="<?php echo $row->id;?>">
</tr>
				
					<?php
					}
				}
				}
					?>

			</tbody>

		</table>
	</form>
</body>
</html>