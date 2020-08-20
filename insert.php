<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>添加网址</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
<?php
  include "functions.php";
  $conn=Connect();

  $Turl=$_POST["save_url"];
  $Tnote=$_POST["save_note"];
  $Tlablecode=GetLablecode($_POST);

  $sql="INSERT INTO Favorites (url,comments,lablecode) VALUES (\"".$Turl."\",\"".$Tnote."\",".($Tlablecode).")";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo "<hl>添加成功！正在跳转...</hl>";
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
