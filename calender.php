<?php
//万年历的实现
	
//1、获取当前信息年和月（默认是当前信息）
//if(isset($_GET["y"]))
$year=@$_GET["y"]?$_GET["y"]:@date("Y");//如果给了年份，就显示给的年份，若没有，就获取当前的年份
$mon=@$_GET["m"]?$_GET["m"]:@date("m");//如果给了月份，就显示给的月份，若没有，就获取当前的月份
//2、计算出当月有多少天、本月1号是星期几
    //date("t");//给定月份所拥有的天数
    $day = @date("t",mktime(0,0,0,$mon,1,$year));//获取对应月的天数。mktime(时分秒月日年)
    $w = @date("w",mktime(0,0,0,$mon,1,$year));//获取当前月中 一号是星期几

//3、输出日期的头部信息（标题和表头）
echo "<center>";	
echo "<h1>{$year}年{$mon}月</h1>";
echo "<table border='1' width='600' >";
echo "<tr>";
echo "<th style='color:red'>星期日</th>";
echo "<th>星期一</th>";
echo "<th>星期二</th>";
echo "<th>星期三</th>";
echo "<th>星期四</th>";
echo "<th>星期五</th>";
echo "<th style='color:green'>星期六</th>";
echo "</tr>";

//4、循环遍历输出日期信息
 /*for($i=1;$i<=5;$i++){//5行
		
		echo "<tr>";
			for ($j=1;$j<=7;$j++){
				echo "<td>".$j."</td>";
			}
		echo "</tr>";
		}*/
$dd=1;//定义一个循环的天数
while($dd<=$day){
	echo "<tr>";
		//输出一周的信息
		for($i=0;$i<7;$i++){
			//当还没有到输出日期的时候，或日期溢出时，输出空格
			if($w>$i && $dd==1 || $dd>$day){
				echo "<td>&nbsp;</td>";
			}else{
				echo "<td>{$dd}</td>";
				$dd++;
			}
		}
}
	
	echo "</table>";
	echo "<br>";

//5、输出上一月和下一月的超级链接
   //处理上一月和下一月的信息
  //$lastm = $mon-1;//上一月
  //$nextm = $mon+1;//下一月
  //$lasty =$year-1;//上一年
  //$nexty = $year-1;//下一年
  $lastm=$nextm=$mon;
  $lasty=$nexty=$year;
   if($lastm<=1){
   	$lastm=12;
   	 $lasty--;
   }else{
   	$lastm--;
   }
   if($nextm>=12){
   	$nextm=1;
   	$nexty++;
   }else{
   	$nextm++;
   }

echo "<a href='calender.php?y={$lasty}&m={$lastm}'>上一月</a>&nbsp;&nbsp;&nbsp;";
echo "<a href='calender.php?y={$nexty}&m={$nextm}'>下一月</a>";

echo "</center>";
?>