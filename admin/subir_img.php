<?php 
date_default_timezone_set('America/El_salvador');
$fecha= date('ymdhis');
$_FILESimg ='img_'.$fecha;
$tipo=$_FILES['Ima']['type'];
$tmp=$_FILES['Ima']['tmp_name'];
$ext=substr($tipo,6,20);
$_FILESimg=$_FILESimg.'.'.$ext;
if($tipo=='image/jpeg' || $tipo=='image/jpg' ||
    $tipo=='image/png' ||$tipo=='image/gif'){
	copy($tmp,'../img/'.$_FILESimg);
}
 ?>
 <script type="text/javascript">
 	console.log('gdfg');
 </script>