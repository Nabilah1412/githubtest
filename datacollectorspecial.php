<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
/*
$sources = "http://www.data.jma.go.jp/mscweb/data/himawari/sat_hrp.php?area=r2s"; 
$content = file_get_contents($sources);
//echo($content);
preg_match("@<select name=\"slt_time\".*?</select>@si", $content, $data1);
preg_match("@value=.*?</option>@si", $data1[0], $data2);
$datanya = str_replace("</option>","",$data2[0]);
list($timedata,$fulltimedata) = explode(">",$datanya);
$timedata=str_replace("value=","",$timedata);
list($timenya,$datenya) = explode("UTC",$fulltimedata);
list($harinya,$bulannya,$tahunnya) = explode(" ",trim($datenya));
echo("<br>".$timedata);
echo("<br>".$timenya);
echo("<br>".$datenya);
echo("<br>".$harinya);
echo("<br>".$bulannya);
echo("<br>".$tahunnya);
*/

$timedata = array("0740","0730","0720","0710","0700","0650","0640","0630","0620","0610","0600","0550","0540","0530","0520","0510","0500","0450","0440","0430","0420","0410","0400","0350","0340","0330","0320","0310","0300","0250","0230","0220","0210","0200","0150","0140","0130","0120","0110","0100","0050","0040","0030","0020","0010","0000","2350","2340","2330","2320","2310","2300","2250","2240","2230","2220","2210","2200","2150","2140","2130","2120","2110","2100","2050","2040","2030","2020","2010","2000","1950","1940","1930","1920","1910","1900","1850","1840","1830","1820","1810","1800","1750","1740","1730","1720","1710","1700","1650","1640","1630","1620","1610","1600","1550","1540","1530","1520","1510","1500","1450","1430","1420","1410","1400","1350","1340","1330","1320","1310","1300","1250","1240","1230","1220","1210","1200","1150","1140","1130","1120","1110","1100","1050","1040","1030","1020","1010","1000","0950","0940","0930","0920","0910","0900");
$jenisimg = array("r2w_snd_","r2w_b13_","r2w_cve_");

for($m=0;$m<count($timedata);$m++)
{
	for($k=0;$k<count($jenisimg);$k++)
	{
		$path = "satelite/".$jenisimg[$k]."22March2018_".$timedata[$m].".jpg";
		if(!file_exists($path))
		{
		 $url = "http://www.data.jma.go.jp/mscweb/data/himawari/img/r2w/".$jenisimg[$k].$timedata[$m].".jpg";
		 echo($url."<br>");
		 $img = imagecreatefromjpeg($url);
		 imagejpeg($img, $path);
		 sleep(5);
		}
	}
}
?>

</body>
</html>