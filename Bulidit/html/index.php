<html>

<head>
    <meta charset="UTF-8">
    <title>demosql</title>
</head>

<body>
<h1>请输入需要查询的数据:</h1>
<form method="get">
    <input type="text" name="inject" value="1">
    <input type="submit">
</form>

<pre>
<?php
//对数据库标志性sql语句进行过滤
function filter1($inject) {
    preg_match("/select|update|delete|drop|insert|where|\./i",$inject) && die('return preg_match("/select|update|delete|drop|insert|where|\./i",$inject);');
}

function filter2($inject) {
    strstr($inject, "set") && strstr($inject, "prepare") && die('strstr($inject, "set") && strstr($inject, "prepare")');
}

if(isset($_GET['inject'])) {
    $id = $_GET['inject'];
    filter1($id);
    filter2($id);
    $mysqli = new mysqli("127.0.0.1","root","root","demosql");
    //对应id的语句进行查询
    $sql = "select * from `datas` where id = '$id';";
    $res = $mysqli->multi_query($sql);

    if ($res){//使用multi_query()执行一条或多条sql语句
      do{
        if ($rs = $mysqli->store_result()){//store_result()方法获取第一条sql语句查询结果
          while ($row = $rs->fetch_row()){
            var_dump($row);
            echo "<br>";
          }
          $rs->Close();
          if ($mysqli->more_results()){//继续输出更多的结果
            echo "<hr>";
          }
        }
      }while($mysqli->next_result()); 
      echo "error ".$mysqli->errno." : ".$mysqli->error;
    }
    $mysqli->close(); 
}


?>
</pre>

</body>

</html>
