<?php

header("Content-Type: application/json; charset=UTF-8");
/* @var $id type */
$IDASD = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);
$objConnect = mysql_connect("localhost", "root", "0850400151");
$objDB = mysql_select_db("dve");
$strSQL = "SELECT * FROM tb_nited WHERE dep_id = '$IDASD'";
if ($id !== "") {
    $objQuery = mysql_query($strSQL);
    $obResult = mysql_fetch_array($objQuery);
    $kjahsd = $obResult["member_code"];
    $iojgdf = $obResult["member_id"];
    $aetjsk = "SELECT * FROM tb_member WHERE member_id = '$iojgdf'";
    $weq54e = mysql_query($aetjsk);
    $a6d54g = mysql_fetch_array($weq54e);
    if ($obResult) {
        $arr["ID Teacher "] = $obResult["member_id"];
        $arr["ID ของสถานประกอบการ"] = $obResult["dep_id"];
        $arr["type"] = $obResult["type"];
        $arr["firstname"] = $a6d54g["member_firstname"];
        $arr["lastname"] = $a6d54g["member_lastname"];
        $sadha = $obResult["dep_id"];
        $asdasd = $a6d54g["member_firstname"];
        $adasdasdasd = $a6d54g["member_lastname"];
        $sdsdaa = $a6d54g["member_mobile"];


        $named_array = array(
            "API trainer" => array(
                array(
                    "ID ของสถานประกอบการ" => "$sadha",
                    "ชื่อ" => "$asdasd",
                    "นามสกุล" => "$adasdasdasd",
                    "เบอร์โทร" => "$sdsdaa",
                )
            )
        );
        echo json_encode($named_array);
        mysql_close($objConnect);
    } else {
        echo '{"Error": "ID Not found"} ';
    }
}
?>
<?php

header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':

        break;
    case 'GET':

        break;
    default:
        print('{"result": "โปรดระบุค่าไม่ถูกต้อง."}');
}
?>