<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<?php  
   session_start();
$nid=$_SESSION["a_nid"];
   ?>

<div class="a1">

<div class="a1_1">
<h1>

  <?php 
include 'connection.php';
if(isset($_POST['button'])){
  $select=$_POST['select'];
  $query=("select * from prescription where pid ='$select'");
//$query1=("select * from prescription ");
$result=mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
$d_name=$row["dname"];
  echo"DR. Name ".$d_name; }

  ?> </h1>

</div>
<div class="a1_2">
<h1>Patient  Name : <?php echo $_SESSION["a_name"]; ?> </h1>

<p>Patient ID: <?php echo $_SESSION["a_nid"]; ?></p>
</div>

</div>
<div class="a3">
<div class="a3_1">
	<form method="POST">
<select name="select">


<?php 
include 'connection.php';
$query=("select * from prescription where PatientNID ='$nid'");
$result=mysqli_query($connection,$query);

while ($row = mysqli_fetch_array($result)) {
 $pid=$row['pid'];
 
  //echo $row["pid"] ;
  echo "<option value='$pid'>$pid</option>";
  
}

?>

</select>
</div>
<div class="a3_2">

	<input type="submit" name="button" value="view">
</form>
</div>
</div>
<div class="a2">
	<h1>Prescription</h1>
<?php
	if(isset($_POST['button'])){
$select=$_POST['select'];
$query=("select * from prescription where pid ='$select'");
//$query1=("select * from prescription ");
$result=mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
$d_name=$row["dname"];
if ($result) {

	echo " <table border='2'>

  <tr> <td>Pres. ID</td>  <td>Patient's NID</td><td>Disease Info</td> <td>Prescripe By</td><td>Prescripe Date</td><td>Medicine Name</td></tr>
   <tr>  <td>".$row["pid"]."</td> <td>".$row["PatientNID"]."</td><td>".$row["Disease_info"]."</td> <td>".$row["dname"]."</td><td>".$row["Date"]."</td><td>".$row["MedicinName"]."</td></tr>

</table>
<br>
  ";


}


}
?>
</div>



  
  
</table>

</body>
</html>