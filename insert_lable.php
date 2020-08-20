<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>添加标签</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
<?php
  include "functions.php";
  $conn=Connect();

  $Ilable=$_POST["new_lable"];

  $sql="INSERT INTO Lables (lable) VALUES (\"".$Ilable."\")";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<hl>添加标签成功！正在跳转...</hl>";
  }
  else {
    echo "<hl>请重试！</hl>";
  }
  $conn->close();
?>
<script>
	window.location.href="manage_lable.php";
</script>
</body>
</html>
