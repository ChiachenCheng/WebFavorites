<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>删除标签</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
<?php
  include "functions.php";
  $conn=Connect();

  $delable=$_GET["lableid"];
  $sql="DELETE FROM Lables WHERE id=".$delable;
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<hl>删除标签成功！正在跳转...<\hl>";
  }
  else {
    echo "<hl>请重试！<\hl>";
  }
  $conn->close();
?>
<script>
	window.location.href="manage_lable.php";
</script>
</body>
</html>
