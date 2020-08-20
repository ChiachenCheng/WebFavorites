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

  $newnote=$_POST["change_note"];
  $item=$_GET["itemid"];
  $Tlablecode=GetLablecode($_POST);

  $sql="UPDATE Favorites SET comments=\"".$newnote."\",lablecode=".$Tlablecode." WHERE id=".$item;
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<hl>更新成功！正在跳转...</hl>";
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
