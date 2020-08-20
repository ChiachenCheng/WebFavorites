<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>编辑网址</title>
  <link rel="stylesheet" href="common.css">
</head>
<body>
  <hl>
    <strong>编辑网址</strong>
  </hl>
  <?php
    include "functions.php";
    $conn=Connect();
    $item=$_GET["itemid"];
    $Lables=GetLables($conn);
    $lableN=count($Lables);

    $sql="SELECT * FROM Favorites WHERE id=\"".$item."\"";
    $result=mysqli_query($conn,$sql);
    $dataArray=array();
    while($row=mysqli_fetch_array($result)){
        $dataArray[]=$row;
    }
    echo "<p><strong>您正在编辑".$dataArray[0]["url"]."的注释和标签</strong></p>";
    echo "<form action=\"update.php?itemid=".$item."\" method=\"post\">";
  ?>
  <p>
    <label for="change_note">修改注释：<br/>
    <textarea rows="10" cols="40" name="change_note" id="save_note"><?php echo $dataArray[0]["comments"];?></textarea>
  </p>
  <p>修改标签：<br/>
    <?php
      for($i=0;$i<$lableN;$i++){
        echo "<input type=\"checkbox\" name=\"lable".($i+1)."\" value=".(1<<$Lables[$i]["id"]);
        if($dataArray[0]["lablecode"]&(1<<$Lables[$i]["id"]))
          echo " checked";
        echo "><lb>".$Lables[$i]["lable"]."</lb><br>";
      }
    ?>
  </p>
  <input type="submit" value="更改" >
  </form>
  <?php
    echo "<form action=\"delete.php?itemid=".$item."\" method=\"post\">";
  ?>
  <input type="submit" value="删除" >
  </form>
  <p>
    返回主页：
    <a href="index.php" target="_Self">
      <img src="images/wenjianjia.jpg" alt="wenjianjia" width="50px" height="50px">
    </a>
  </p>
<?php
  $conn->close();
?>
</body>
</html>
