
		<ul class="nav menu">
			<li><a href="index.php?url=admin-panel.php"><em class="fa fa-edit">&nbsp;</em> Ajouter un article</a></li>
			<li><a href="index.php?url=admin-edit.php"><em class="far fa-newspaper">&nbsp;</em> Articles</a></li>
			<li class="active"><a href="index.php?url=admin-com-signaler.php"><em class="fas fa-comments">&nbsp;</em> Commentaires Signaler </a></li>
			<li><a href="index.php?url=logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Commentaires Signaler!</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Commentaires Signaler!</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						
					
						
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							
                        <h3>Commentaires Signaler!</h3><BR>
        <div class="comS">
		<?php 

		$cpt = 0;
		$long = count($tableauAffiche) ; 

		while($cpt < $long ){

			$res = $tableauAffiche[$cpt];
			echo"$res";
			$cpt++;
		}
	
		
		
		?>
                               


						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
		
		<div class="row">
			<!--/.col-->
		
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>