<?php
$googleMapAPI='AIzaSyDTgqWbL9DF3qUwgXfohyCDxf9ukPNQLXU';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Case</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script src="lib/jquery.min.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?=$googleMapAPI;?>"></script>
    <script type="text/javascript" src="lib/multiple_markers/js/map.js"></script>
    <link rel="stylesheet" href="lib/datatables/datatables.min.css">
    <script src="lib/datatables/datatables.min.js"></script>
    <script src="lib/highcharts/highcharts.js"></script>
    <script src="lib/highcharts/exporting.js"></script>
	<link rel="stylesheet" href="lib/geral.css">
    <script src="lib/geral.js"></script>
</head>
<body>
<div class="container">
    <h2>Challenge SMARTWATT</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">HOME</a></li>
        <li><a data-toggle="tab" href="#menu1">MONITORING</a></li>
        <li><a data-toggle="tab" href="#menu2">OCCURENCES</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div id="map-canvas" style="width:50%;height:400px;"></div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3 id="JS_tituloAxis"></h3>
            <div class="row">
				<div class="col-xs-7">
					<div id="container" style="float:left;margin:0 auto;"></div>
				</div>
				<div class="col-xs-5">
					<div class="input-group">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
					<input type="text" class="form-control" placeholder="Procurar" id="srch-term">
					</div>
					<select size="5" class="opcaoAxis" id="JS_optionChart"></select>
				</div>
			</div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>OCCURENCES</h3>
            <?php
            include_once("includes/tabela-datatables.inc.php");
            include_once("includes/lightbox-addtr.inc.php");
            ?>
        </div>
    </div>
</div>
</body>
</html>
