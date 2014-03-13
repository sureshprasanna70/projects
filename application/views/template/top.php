<!DOCTYPE html>
<html>
	<?
	echo sizeof($metas);
	for ($i=0;$i<sizeof($metas);$i++) {
		echo '<meta></meta>'.$metas;
	}?>
	
<head>
<title><?php echo $title?></title>
</head>
<body>

