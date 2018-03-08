<?php
	header("Content-Type: application/json; charset=UTF-8");
	$gettoken = $_GET["token"];
    $objConnect = mysql_connect("localhost","root","0850400151");
	$objDB = mysql_select_db("dve");
    $strSQL = "SELECT * FROM tb_member WHERE AccessToken = '$gettoken'";
	$objQuery = mysql_query($strSQL);
	$obResult = mysql_fetch_array($objQuery);
	if ($gettoken == ""){
	echo '{"result": "ไม่พบToken หรือไม่มีอยู่ในระบบ"} '; 
	}
	if ($gettoken !== "") {
	    $arr["UserID"] = $obResult["member_code"];
		$arr["Firstname"] = $obResult["member_firstname"];
		$arr["Lastname"] = $obResult["member_lastname"];
		$arr["Email"] = $obResult["member_email"];
		$arr["Mobile"] = $obResult["member_mobile"];
		$arr["Address"] = $obResult["member_address"];
		$arr["Zipcode"] = $obResult["member_zipcode"];
		$arr["AccessToken"] = $obResult["accesstoken"];
		mysql_close($objConnect);
    	echo json_encode($arr);
	}
	
?>