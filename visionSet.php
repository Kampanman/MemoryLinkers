<?
$ret = array();
$ret['result'] = "NG";


if(isset($_POST['url'])){
  $ret['result'] = "OK";
  $ret['message'] = "<iframe width='560' height='315' src='https://www.youtube.com/embed/".$_POST['url']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";

header("Content-Type: application/json; charset=utf-8");
echo json_encode($ret);
}