<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php 
switch($_FILES['upFile']['error']){
	case UPLOAD_ERR_OK:

		if( file_exists("images")===false){
			mkdir("images"); //make directory
		}

		$from = $_FILES['upFile']['tmp_name'];

		$to = "images/" . $_FILES['upFile']['name'];
		if(copy( $from, $to)){
			echo "上傳成功";
		}
		else{
			echo "上傳失敗";
		}
		break;
	case UPLOAD_ERR_INI_SIZE:
		echo "上傳檔案太大,不可超過",ini_get("upload_max_filesize") , "<br>";
		break;
	case UPLOAD_ERR_FORM_SIZE:
		echo "上傳檔案太大,不可超過",$_POST["MAX_FILE_SIZE"] , "Byte(位元組)<br>";
		break;
	case UPLOAD_ERR_PARTIAL:
		echo "上傳檔案不完整<br>";
		break;
	case UPLOAD_ERR_NO_FILE:
		echo "檔案未選<br>";
		break;
	default:
	  echo "請通知系統維人員,錯誤代碼 : " , $_FILES["upFile"]["error"] ,"<br>";

}

// echo "['error']: " , $_FILES['upFile']['error'] , "<br>";
// echo "['name']: " , $_FILES['upFile']['name'] , "<br>";
// echo "['tmp_name']: " , $_FILES['upFile']['tmp_name'] , "<br>";
// echo "['type']: " , $_FILES['upFile']['type'] , "<br>";
// echo "['size']: " , $_FILES['upFile']['size'] , "<br>";
?>

</body>
</html>