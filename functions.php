<?php
function Connect(){
  $conn = new mysqli("localhost", "root", "root", "FavorDatabase");
  if ($conn->connect_error) {
      die("连接失败: " . $conn->connect_error);
      return -1;
  }
  return $conn;
}
function GetLables($conn){
  $conn=Connect();
  $sql="SELECT * FROM Lables";
  $result=mysqli_query($conn,$sql);
  if($result){
  }
  else {
    echo "对不起，标签加载出错！请刷新页面（快捷键F5）\n";
  }
  $dataArray=array();
  while($row=mysqli_fetch_array($result)){
      $dataArray[]=$row;
  }
  return $dataArray;
}
function GetLablecode($arr){
  $Lables=GetLables($conn);
  $lableN=count($Lables);

  $Tlablecode=0;
  for($i=0;$i<$lableN;$i++){
    if(array_key_exists("lable".($i+1),$arr))
      $Tlablecode+=$arr[("lable".($i+1))];
  }
  return $Tlablecode;
}
?>
