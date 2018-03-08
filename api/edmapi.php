<?php

$host = "localhost";
$username = "";
$password = "";
$db = "";
$link = mysqli_connect("localhost", "", "", "");
header("Content-Type: application/json; charset=UTF-8");
/* @var $id type */
$IDASD = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
$objConnect = mysql_connect("localhost", "root", "0850400151");
$objDB = mysql_select_db("dve");
$query = "SELECT * FROM tb_member WHERE dep_id = '$IDASD'";
if ($IDASD == "") {
    echo '{"Error": "ID Not found"} ';
} else if ($IDASD !== "") {
    $objQuery = mysqli_query($objConnect, "SELECT * FROM tb_member WHERE dep_id = '$IDASD'");
    $obResult = mysqli_fetch_array($objQuery);
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if ($obResult) {
        $arr["ชื่อ"] = $obResult["member_firstname"];
        $arr["นามสกุล"] = $obResult["member_lastname"];
        $arr["เลขประจำตัว"] = $obResult["member_code"];

        echo json_encode($arr);
        mysql_close($objConnect);
    }
}
?>
