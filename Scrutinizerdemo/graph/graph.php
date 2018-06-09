<html>

<?php
header("Content-Type: application/javascript");
$a=1;
$c=16;
?>
<div id="tester" style="width:600px;height:250px;"></div>
<head>
	<script type="text/javascript" src="plotly-latest.min.js">
	var a=<?php echo json_encode($a); ?>;
	var c=<?php echo $c; ?>;
	</script>
<script>
	TESTER = document.getElementById('tester');
	Plotly.plot( TESTER, [{
	x: [a, 2, 3, 4, 5],
	y: [1, 2, 4, 8, 16] }], {
	margin: { t: 0 } } );
</script>
</head>
</html>