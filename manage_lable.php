<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>管理标签</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
  <hl>
    <strong>管理标签</strong>
  </hl>
  <p>
  <form action="insert_lable.php" method="post">
    <input type="text" name="new_lable" size="40" id="save_url">
    <input type="submit" value="添加标签" >
  </form>
  </p>
  <?php
    include "functions.php";
    $conn=Connect();
    $Lables=GetLables($conn);
    $lableN=count($Lables);

    for($i=0;$i<$lableN;$i++){
      echo "<p>标签".($i+1).":<lb>".$Lables[$i]["lable"]."</p>";
      echo "<form action=\"delete_lable.php?lableid=".$Lables[$i]["id"]."\" method=\"post\">";
      echo "<input type=\"submit\" value=\"删除标签\" ></form>";
    }
  ?>
  <p>
    返回主页：
    <a href="index.php" target="_Self">
      <img src="images/wenjianjia.jpg" alt="wenjianjia" width="50px" height="50px">
    </a>
  </p>
</body>
</html>
