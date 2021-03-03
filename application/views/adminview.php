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
	{
padding:0px;
margin:0px;
}

.menubar
{
background-color:black;
text-align:center;

}
.menubar ul
{
list-style:none;
display:inline-flex;
padding:15px;

}
.menubar ul li a
{
text-decoration:none;
color:white;
padding:15px;
}
.menubar ul li
{
padding:10px;

}
.menubar ul li a:hover
{
background-color:green;
border-radius:10px;

}
.submenu
{
display:none;
}
.menubar ul li:hover .submenu
{
display:block;
position:absolute;
background-color:black;
border-radius:10px;

}
.menubar ul li:hover .submenu ul
{
display:block;
}
.submenu ul li
{
border-bottom:2px solid green;
}
</style>
<body>
	<form method="post" action="<?php echo base_url()?>main/adminview">
	<div class="first">
		<nav class="menubar">

	<ul>
		<li> <a href="<?php echo base_url()?>main/userform">HOME </a></li>
		<li> <a href="<?php echo base_url()?>main/adminview">View users</a>
		<li> <a href="<?php echo base_url()?>main/userform">logout</a>

			
				</ul>
			</div>
		</li>

	</ul>
</nav>
		<div><h1 style="color: red;text-align: center">REGISTERED USERS</h1></div>
	
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
<td><?php echo $row->phno;?></td>
<td><?php echo $row->address;?></td>
<td><?php echo $row->district;?></td>
<td><?php echo $row->pin;?></td>
<td><a href="<?php echo base_url()?>main/deleteuser/<?php echo $row->loginid;?>">Delete</a></td>

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