<?php
session_start();
require "connection.php";
if($_POST)
{

$name=$_POST["name"];
$htno=$_POST["hall"];
$marks=$_POST["marks"];
$first=$_POST["first"];
$second=$_POST["second"];
$third=$_POST["third"];
$fourth=$_POST["fourth"];
$fifth=$_POST["fifth"];
$sixth=$_POST["sixth"];
$sql="select HTNO from admissions where HTNO =$htno";
$result=mysqli_query($con,$sql);
$imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $imageType = $_FILES["image"]["type"];
        $stmt = $con->prepare("INSERT INTO admissions VALUES ('$name','$htno','$marks','$first','$second','$third','$fourth','$fifth','$sixth',?,?)");
        $stmt->bind_param("ss", $imageData, $imageType);
        if ($stmt->execute()) {
            echo "APPLICATION SUBMITED  SUCESSFULLY.";
        } else {
            echo "ERROR IN APPLYING " . $stmt->error;
        }
$con->close();       
}?>

<html>
 <head>
   <link rel="stylesheet" href="styles.css"></link>
   <style>
    #res{
      width:15%;
      height:15%;
      background-color:burgundy;
      margin-left:40%;
    }
   </style>
   <script  src="jj.js" type="text/javascript"></script>
   <script>
  $(document).ready(function() {
    // Set initial content of #res to "hi"
    $("#res").hide();
      $.ajax({
        url: "appliajax.php",
        success: function(result) {
          // Check if result is equal to 1 (assuming result is a string, use strict comparison === for numbers)
          if (result.trim() == "1") {
            $("#res").hide();
          } else {
            // Hide #bb element and update #res with result
            $("#bb").hide();
            $("#res").show();
            $("#res").html(result);

          }
        },
        error: function() {
          // Handle error if AJAX request fails
          $("#res").html("Error fetching data");
        }
      });
  });
</script>

 </head>
<body>
  <div id="res"></div>
  <div id="bb">
    <p>THE MARKS MEMO SOULD BE A IMAGE TYPE.IT WILL NOT SUPPORT PDF FORMAT</p>
<form name="app"id="app"method="post" action="appli.php"enctype="multipart/form-data">
  <fieldset ><legend style="color:red">APPLICATION FORM</legend><table border="0">
 
  <tr><td colspan="2"><input type="text" name="name"id="name"value="<?php echo $_SESSION['NAME']; ?>"required readonly/><br>
<tr><td colspan="2"><input type="number"name="hall"id="hall"value="<?php echo $_SESSION['HTNO']; ?>"required readonly><br></tr>
<tr><td colspan="2"><input type="number" placeholder="Marks:" max="600"name="marks"id="marks"width="50%"required/><br></tr>

<tr><td>Select Options:
<br>

<td>1<sup>st</sup>:<select name="first"id="1st"required>       <option value="none">NONE               <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br>
  2<sup>nd</sup>:<select name="second">   <option value="none">NONE                   <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br>
  3<sup>rd</sup>:<select name="third">      <option value="none">NONE                <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br>
  4<sup>th</sup>:<select name="fourth">        <option value="none">NONE               <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br>
  5<sup>th</sup>:<select name="fifth">   <option value="none">NONE                   <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br>
  6<sup>th</sup>:<select name="sixth">   <option value="none">NONE                   <option value="dcme">DCME
  <option value="dece">DECE
    <option value="deee">DEEE<option value="dce">DCE<option value="dme">DME<option value="dmng">DMNG</select><br></tr>
<br></tr>
<tr><td>marks memo:</td><td ><input  type="file"id="mm" name="image" required><br>
 </tr>
  <tr><td colspan="2"><input type="submit"></tr></table></fieldset>
</form>
</div></body></html>