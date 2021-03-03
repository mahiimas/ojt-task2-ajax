<!DOCTYPE html>
<html>
<head>
	<title>new</title>
</head>
<style>
	*
{
	padding:0px;
	margin:0px;
}


fieldset
{
	background-color: rgba(0,0,0,0.5);
	margin-top: 50px;
	margin-left: 550px;
	height:200px;
	width:400px; 
	text-align: center;


}

h1
{
	font-size: 60px;
}



table{
	
	padding:20px;
	margin:50px;
	border-collapse:collapse;
	text-align:center;
	}	
</style>
<body>
	
	<form method="post" action="<?php echo base_url()?>main/logns">
		<fieldset>
			<div><h2 style="color: red">login</h2></div>
			<br>
		<table border="1">
		

				 email:
					<input type="email" name="email"></br></br>
					password:
					<input type="password" name="password"></br><br>
					<input type="submit" value="submit" name="submit">
				</fieldset>
				
				
				
					
</table>
</form>
</body>
</html>