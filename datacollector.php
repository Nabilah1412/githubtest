<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FUAD E-RADAR</title>
 <meta http-equiv="refresh" content="60"/>

</head>

<body>
<?php 
$sources = "http://www.data.jma.go.jp/mscweb/data/himawari/sat_hrp.php?area=r2s"; 
$content = file_get_contents($sources);
//echo($content);

preg_match("@<select name=\"slt_time\".*?</option>@si", $content, $data1);
preg_match("@value=.*?</option>@si", $data1[0], $data2);
$datanya = str_replace("</option>","",$data2[0]);
list($timedata,$fulltimedata) = explode(">",$datanya);
$timedata=str_replace("value=","",$timedata);
list($timenya,$datenya) = explode("UTC",$fulltimedata);
$datenya = trim($datenya);
list($harinya,$bulannya,$tahunnya) = explode(" ",$datenya);
$datefile = str_replace(" ","",$datenya);
/*echo("<br>".$timedata);
echo("<br>".$timenya);
echo("<br>".$datenya);
echo("<br>".$harinya);
echo("<br>".$bulannya);
echo("<br>".$tahunnya);
*/


$jenisimg = array("r2w_snd_","r2w_b13_","r2w_cve_","r2s_dnc_");

for($k=0;$k<count($jenisimg);$k++)
{
	$path = "satelite/".$jenisimg[$k].$datefile."_".$timedata.".jpg";
	if(!file_exists($path))
	{
	 $typeimage = substr($jenisimg[$k],0,3);
	 $url = "http://www.data.jma.go.jp/mscweb/data/himawari/img/".$typeimage."/".$jenisimg[$k].$timedata.".jpg";
	 echo("<center>SAVING IMAGE FOR FILENAME: ".$datefile." TIME: ".$timedata." ON PROGRESS......<br>".$url."</center><br>");
	 $img = imagecreatefromjpeg($url);
	 imagejpeg($img, $path);
	}else
	{
		echo("<center>WAITING FOR NEXT INTERVAL (".$jenisimg[$k].").....</center><br>");
	}
}

?>

</body>
</html>