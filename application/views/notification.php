<!DOCTYPE html>
<html>
<head>
<title>Flight Notification Adding</title>

<meta charset=utf-8>
            <meta name="viewport" content="width=device-width,initial-scale=1">

             <!---Fontawesome--->
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <!---Bootstrap5----->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<style>

fieldset{
width:500px;
height: 400px;

}
</style>
</head>
<body>


<form method="post" action="<?php echo base_url()?>main/notify_action" class="form-group">
<center>

<fieldset class="mt-3">
<h1>Flight notification</h1>
Select Flight:
<select name="flight" class="form-select">
<?php
if($n->num_rows()>0)
{
foreach($n->result() as $row)
{
?>
               
<option value="<?php echo $row->f_id;?>"><?php echo $row->cname;?>
</option>


<?php
}
}
?>
</select><br><br>
<textarea placeholder="Notification" name="noti" class="form-control"></textarea><br><br>

<a href="#" class="btn btn-secondary"> Back </a>
<input type="submit" name="submit" value="Notify" class="btn btn-primary">

</fieldset>
</center>

</form>

</body>
</html>
