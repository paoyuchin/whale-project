<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title></title>
</head>
<body>
<form id="myForm" enctype="multipart/formData">
	<input type="file" name="upFile">
	<input type="button" id="btn" value="submitttt">
</form>	
<script type="text/javascript">
document.getElementById("btn").onclick = function(){
	var xhr = new XMLHttpRequest();
	var myForm = document.getElementById("myForm");
	var formObj = new FormData( myForm);
	xhr.open("Post", "testPhp.php", true);
	xhr.send( formObj )
}	
</script>	
</body>
</html>