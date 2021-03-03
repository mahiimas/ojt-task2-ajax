<!DOCTYPE html>
<html>
<head>
	<title>work</title>
</head>
<style>
	*
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
	<div class="first">
		<nav class="menubar">

	<ul>
		<li> <a href="<?php echo base_url()?>main/userform">HOME </a></li>
		<li> <a href="<?php echo base_url()?>main/adminview">View users</a>
		<li> <a href="<?php echo base_url()?>main/login">logout</a>

			
				</ul>
			</div>
		</li>

	</ul>
</nav>
		<div><h1 style="color: red;text-align: center">ADMIN HOME PAGE</h1></div>
		

				

				
	
		
				
					
</table>
</form>
</body>
</html>