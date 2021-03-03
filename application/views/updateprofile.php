<!DOCTYPE html>
<html>
<head>
<title>Afrs</title>
</head>
<meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">

             <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        </head>
<style>
{
padding:0px;
margin:0px;
}

</style>
<body>
<form method="post" action="<?php echo base_url()?>main/userupdate">

<?php
if(isset($user_data))
{
foreach($user_data->result() as $row1)
{
?>
<fieldset>
<table class="table table-striped table-info">
     

firstname
  <input type="text" name="firstname" pattern="[a-zA-Z]+" required="" maxlength="25" value="<?php echo $row1->firstname;?>"></br></br>
  last name
  <input type="text" name="lastname" pattern="[a-zA-Z]+" required="" maxlength="25" value="<?php echo $row1->lastname;?>"></br></br>
  username
  <input type="text" name="username" pattern="[a-zA-Z]+" required="" maxlength="25" value="<?php echo $row1->username;?>"></br></br>
  phone
  <input type="text" name="phone"  required minlength="10"maxlength="10" value="<?php echo $row1->phone;?>"></br></br>
  DOB
  <input type="date" name="dob"  required value="<?php echo $row1->dob;?>"></br></br>
  address
  <textarea name="address"  required maxlength="25"><?php echo $row1->address;?></textarea></br></br>
  District
  <input type="text" name="district"  required  pattern="[a-zA-Z]+"maxlength="25" value="<?php echo $row1->district;?>"></br></br>
  Pin
  <input type="text" name="pin"  required maxlength="10" value="<?php echo $row1->pin;?>"></br></br>
  email
  <input type="email" name="email" value="<?php echo $row1->email;?>"></br></br>



<input type="hidden" name="id" value="<?php echo $row1->id;?>">
<input type="submit" value="update" name="update">
<?php
}
}?>


</table>
</fieldset>
</form>
</body>
</html>

