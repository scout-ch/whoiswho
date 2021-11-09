<!DOCTYPE html>
<html lang="en">
<?php 
	include "./HitobitoCaller.php";
	$caller = new HitobitoCaller();
	$json_result = $caller -> callGroup("609");
?>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Who is Who</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/chart.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./js/orgchart.js"></script>
	<script src="./js/NodesController.js"></script>
</head>
<body>
	<div id="backNav"><a href="#" >Zurück</a></div>
	<div style="width:100%; height:500px;" id="vorstand"/>
	<div id="tree" />

	<script>
		$(document).ready(function () {
			const controller = new NodesController();
			const vorstand = controller.designGroup(
				JSON.parse('<?php echo $json_result; ?>'),
				"Vorstand",
				"strategische Ebene",
				"./img/comittee.png"
			);

			drawVorstand(vorstand);
		});

		function drawVorstand(vorstand) {
			console.log(vorstand);
		    var chart = new OrgChart(document.getElementById("vorstand"), {
		    	//template: "rony",
		    	layout: OrgChart.tree,
		    	scaleInitial: OrgChart.match.boundary,
		    	enableSearch: false,
		        nodeBinding: {
		            field_0: "Name",
		            field_1: "Meta",
		            img_0: "img_url"
		        },
		        nodes: vorstand
		    });
		}
		
	</script>
</body>
</html>