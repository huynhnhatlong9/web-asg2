<?php 
include "./lib/database.php";
session_start();
if (isset($_POST["email"])&& isset($_POST["password"])){
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = $_POST["password"];
    $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
    $run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);

    if ($count==1){
        $_SESSION["uid"] = $row["user_id"];
        $_SESSION["name"] = $row["first_name"];

    }
    header('Location: index.php');
}

?>
<form method="POST" action="login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Email</td>
	    			<td><input type="text" name="email" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>