<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>网络收藏夹</title>
  <link rel="stylesheet" href="common.css">
</head>
<?php
  include "functions.php";
  $conn=Connect();
  $Lables=GetLables($conn);
  $lableN=count($Lables);
?>
<body>
  <hl>
    网络收藏夹
  </hl>
  <form action="insert.php" method="post">
    <p>
      <label for="save_url">收藏新的网站：</label><br>
      <input type="url" name="save_url" size="60" id="save_url">
    </p>
    <p>
      <label for="save_note">为这个网站添加注释：<br/>
      <textarea rows="10" cols="60" name="save_note" id="save_note"></textarea>
    </p>
    <p>为这个网站添加标签：<br/>
    <?php
      for($i=0;$i<$lableN;$i++)
        echo "<input type=\"checkbox\" name=\"lable".($i+1)."\" value=".(1<<$Lables[$i]["id"])."><lb>".$Lables[$i]["lable"]."</lb><br>";
    ?>
    </p>
    <input type="submit" value="添加到收藏夹" >
  </form>
  <form>
    <p>查找标签：<br/>
    <?php
      for($i=0;$i<$lableN;$i++){
        echo "<input type=\"checkbox\" name=\"Slable".($i+1)."\" value=".(1<<$Lables[$i]["id"]);
        if(array_key_exists("Slable".($i+1),$_GET))
          echo " checked";
        echo "><lb>".$Lables[$i]["lable"]."</lb><br>";
      }
    ?>
    <input type="submit" value="查找" >
    </p>
  </form>
  <form action="manage_lable.php">
    <input type="submit" value="管理标签" >
  </form>
  <?php
    $sql="SELECT * FROM Favorites";
    $result=mysqli_query($conn,$sql);
    if($result){
    }
    else {
      echo "对不起，查询出错！请刷新页面（快捷键F5）\n";
    }

    $dataArray=array();
    while($row=mysqli_fetch_array($result)){
      $dataArray[]=$row;
    }
    $conn->close();

    $Slablecode=0;
    for($i=0;$i<$lableN;$i++){
      if(array_key_exists("Slable".($i+1),$_GET))
        $Slablecode+=$_GET[("Slable".($i+1))];
    }
    if($Slablecode==0){
      echo "以下是您收藏的全部网站：\n";
    }
    else {
      echo "以下是符合您筛选要求的网站：\n";
    }

    $dataN=count($dataArray);
    echo "<table align=\"center\" border=\"1\" style=\"border-style: solid; border-color: #1453ad; border-width: 2px;\">";
    echo "<tr><th>链接</th><th>网站注释</th><th>网站标签</th></tr>";
    for($i=0;$i<$dataN;$i++)
      if(($Slablecode==0)||($dataArray[$i]["lablecode"]&$Slablecode)){
        echo "<tr>";
        echo "<td>链接".($i+1)."："."<a href=\"".$dataArray[$i]["url"]."\">".$dataArray[$i]["url"]."</a></td>";
        echo "<td>".$dataArray[$i]["comments"]."</td>";
        echo "<td>";
        for($j=0;$j<$lableN;$j++)
          if($dataArray[$i]["lablecode"]&(1<<$Lables[$j]["id"]))
            echo "<lb>".$Lables[$j]["lable"]."</lb>  ";
        echo "</td>";
        echo "<td><form action=\"edit.php?itemid=".$dataArray[$i]["id"]."\" method=\"post\"><input type=\"submit\" value=\"编辑\" ></form></td></tr>";
      }
    echo "</table>"
  ?>
</body>
</html>
