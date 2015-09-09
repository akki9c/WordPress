<?php


clearstatcache();


if(isset($_POST['password']))
{
	$ak_pass='test12345';
	if($_POST['password']=='test12345'){
	//$newURL = 'http://brokernotes.co/csv.php';
	//header('Location: '.$newURL);
	
	echo'<form action="upload_csv.php" method="post" enctype="multipart/form-data"  style="margin-left: 29%; margin-top: 25%;">
    Select CSV file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" style="border: 1px solid rgba(17, 52, 206, 0.84);">
    <input type="submit" value="Upload CSV" name="submit">
</form>';
	}
	else{
		echo "Password did not match, Please Try again"."<br />";
		echo'<form method="POST" action="http://brokernotes.co/csv.php" id="passform" name="passform">
	<input type="pass" id="pass" name="password" value="">
	<input type="submit" value="submit"></form>';
	}
}


else {
	echo'<form method="POST" action="http://brokernotes.co/csv.php" id="passform" name="passform">
	<input type="pass" id="pass" name="password" value="">
	<input type="submit" value="submit"></form>';
	

	
	
	}
?>



