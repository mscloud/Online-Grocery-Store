<!doctype html>
<html>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'new');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$id=$_GET['id'];
$sql="SELECT * FROM payment where id='$id'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);

if($count == 1)
{
	$iid=$row['id'];
$name=$row['name'];
$cardnum=$row['cardnum'];
	$exprydate=$row['exprydate'];
	$cvv=$row['cvv'];
	$zip=$row['zipcode'];
	$type=$row['type'];
	
	
	
}
else
{
//{ echo "no value";
}


?>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style type="text/css">
.ok {
	position: absolute;
	height: 72px;
	width: 352px;
	left: 911px;
	top: 21px;
	right: auto;
	bottom: auto;
}
.ok1 {
	position: absolute;
	height: auto;
	width: 1231px;
	left: 9px;
	top: 63px;
	right: auto;
	bottom: auto;
}
.ok2 {
	position: absolute;
	height: 101px;
	width: 558px;
	left: 8px;
	top: 0px;
	right: auto;
	bottom: auto;
}
.ok2 {
}
.ok2 {
}
.ok3 {
	position: absolute;
	height: 42px;
	width: 362px;
	left: 907px;
	top: 56px;
	right: auto;
	bottom: auto;
}
.ok4 {
	position: absolute;
	height: 46px;
	width: 84px;
	left: 11px;
	top: 65px;
	right: auto;
	bottom: auto;
}
.ok4 {
}
.ok5 {
	position: absolute;
	height: auto;
	width: auto;
	left: 450px;
	top: 61px;
	right: auto;
	bottom: auto;
}
.ok6 {
	position: absolute;
	height: 753px;
	width: 715px;
	left: 669px;
	top: 111px;
	right: auto;
	bottom: auto;
}
.ok7 {
	position: absolute;
	height: 158px;
	width: 160px;
	left: 35px;
	top: 155px;
	right: auto;
	bottom: auto;
}
.ok9 {
	position: absolute;
	height: 182px;
	width: 184px;
	left: 249px;
	top: 157px;
	right: auto;
	bottom: auto;
}
.ok88 {
	position: absolute;
	height: 188px;
	width: 212px;
	left: 502px;
	top: 146px;
	right: auto;
	bottom: auto;
}
.ok12 {
	position: absolute;
	height: 173px;
	width: 183px;
	left: 25px;
	top: 455px;
	right: auto;
	bottom: auto;
}
.ok10 {
	position: absolute;
	height: 185px;
	width: 208px;
	left: 261px;
	top: 438px;
	right: auto;
	bottom: auto;
}
.ok23 {
	position: absolute;
	height: 414px;
	width: 502px;
	left: 65px;
	top: 167px;
	right: auto;
	bottom: auto;
}
.ok90 {
	position: absolute;
	height: 89px;
	width: 358px;
	left: 639px;
	top: 80px;
	right: auto;
	bottom: auto;
}
</style>
</head>

<body>
<div class="ok">
  <h3>WELCOME CUSTOMER:
    <?php
session_start();
echo $_SESSION['username'];
?>
  </h3>
  <p>&nbsp;</p>
</div>
<div class="ok1"> 
  <hr>
</div>
<div class="ok2">
  <h1>WALMART GROCERY SHOPPING</h1>
</div>

<div class="ok3">
  <h3><a href="logout1.php" style="text-decoration: none" >LOGOUT</a> | ACCOUNT |<a href="checkout.php" style="text-decoration: none"> CHECKOUT</a></h3>
</div>
<div class="ok4">
  <h3><a href="cust_welcome.php" style="text-decoration: none">HOME</a></h3>
</div>
<div class="ok5">
  <h3>CATEGORIES</h3>
</div>

<div class="ok6"><img src="maxresdefault.jpg" width="650" height="600" alt=""/></div>
<div class="ok23"><center>
    <h1>PAYMENT DETAILS   </h1>
    <h3>
    <form action="updatepay.php" method="post">
      <p>
        <label for="textfield2">NAME:  </label>
        <input type="text" name="name" id="name" value="<?php echo $name ?>">
        <label for="textfield3"><br>
          <br>
          CARD NUM:</label>
            <input type="text" name="cardnum" id="cardnum" value="<?php echo $cardnum ?>">
        <label for="textfield4"><br>
          <br>
          EXPRY DATE(MM/YY):</label>
        <input type="text" name="exprydate" id="exprydate" value="<?php echo $exprydate ?>">
        
        <label for="textfield5"><br>
          <br>
          CVV:</label>
        <input type="text" name="cvv" id="cvv" value="<?php echo $cvv ?>">
        <label for="textfield6"><br>
          <br>
          BILLING ZIPCODE:</label>
        <input type="text" name="zipcode" id="zipcode" value="<?php echo $zip ?>">
        <label for="textfield7"><br>
          <br>
          TYPE(VISA/MASTERCARD):</label>
        <input type="text" name="type" id="type" value="<?php echo $type ?>">
      </p>
      <p>
        <input type="submit" name="submit" id="submit" value="UPDATE">
    </p>
    </form>  
    </h3>
    <form action="viewpay.php" >
      <input type="submit" name="button" id="button" value="VIEW">
    </form>
    <h3>&nbsp;    </h3>
      <?php
	  if(isset($_POST['submit']))
{
include("config.php");
$val1 = $_POST['name'];
$val2 = $_POST['cardnum'];
$val3 = $_POST['exprydate'];
$val4 = $_POST['cvv'];
$val5 = $_POST['zipcode'];
$val6 = $_POST['type'];
$sql2="UPDATE payment SET cardnum='$val2', exprydate='$val3', cvv='$val4', zipcode='$val5', type='$val6' WHERE name='$val1'";
if(mysqli_query($db, $sql2))
{
  echo "Records updated successfully."; 
}


 else{
  
 echo "ERROR: Could not able to execute $sql. " ;
}
}
	  	  ?>
      
    </p>
</center>
</div>
<div class="ok90">
<form action="search.php" method="GET">
  <input name="query" type="text" id="textfield">
  <input type="submit" name="submit2" id="submit2" value="Search">
  </form>
 
</div>
</body>
</html>