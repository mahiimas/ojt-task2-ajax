<!DOCTYPE html>
<html>
<head>
	<title>Registration</title> 
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 

<style>
	fieldset
{
	background-color: rgba(0,0,0,0.5);
	margin-top: 50px;
	margin-left: 550px;
	height:800px;
	width:400px; 
	text-align: center;


}
</style>
<body>

<form method="post" action="<?php echo base_url()?>main/insert">
	<fieldset>
		<div><h2 style="color: red">Registration form</h2></div>
			<br>

    
	<input type="text" name="firstname" pattern="[a-zA-Z]+" required="" maxlength="25" class="form-control" placeholder="firstname"></br></br>
	
	<input type="text" name="lastname" pattern=".{3,}"   required title="3 characters minimum" maxlength="25" class="form-control" placeholder="lastname"></br></br>
	<input type="text" name="username"  required pattern=".{3,}"   required title="3 characters minimum" maxlength="10" placeholder="username" class="form-control"></br></br>
	<input type="text" name="phno"  id="phno" required minlength="10"maxlength="10" class="form-control" placeholder="phone">
	<span id="phno_result"></td></span></br></br>
	
	<input type="date" name="dob"  required class="form-control"  placeholder="dob"></br></br>

	<textarea name="address"  required maxlength="25" class="form-control" placeholder="address"></textarea></br></br>

	<input type="text" name="district"  required  pattern="[a-zA-Z]+"maxlength="25" class="form-control" placeholder="district"></br></br>

	<input type="text" name="pin"  required maxlength="10" class="form-control" placeholder="pin"></br></br>

 
           <input type="text" name="email" id="email"  placeholder="email" class="form-control" />  
           <span id="email_result"></span>  <br>
	<input type="password"  placeholder="password" class="form-control" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"></br></br>
	<input type="submit" value="register" name="submit" >
	<a href="<?php echo base_url()?>main/login">LOGIN </a>
</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/email_availibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  

      $('#phno').change(function(){  
           var phno = $('#phno').val();  
           if(phno != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/phno_availability",  
                     method:"POST",  
                     data:{phno:phno},  
                     success:function(data){  
                          $('#phno_result').html(data);  
                     }  
                });  
           }  
      });  
      
 });  
 </script>  


</body>
</html>
