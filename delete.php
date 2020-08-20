<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>删除网址</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
<?php
  include "functions.php";
  $conn=Connect();

  $item=$_GET["itemid"];
  $sql="DELETE FROM Favorites WHERE id=".$item;
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<hl>删除成功！正在跳转...</hl>";
  }
  else {
    echo "<hl>请重试！</hl>";
  }
  $conn->close();
?>
<script>
	window.location.href="index.php";
</script>
</body>
</html>
