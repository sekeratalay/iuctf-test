<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>İUCTF - Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="/css/fontawesome/css/fontawesome.all.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="/css/sb-admin.min.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
</head>

<body id="page-top">
	<?= $this->include('admin/templates/header') ?>

	<div id="wrapper">
		<!-- Sidebar -->
		<?= $this->include('admin/templates/sidebar') ?>

		<div id="content-wrapper">
			<div class="container-fluid">
				<?= $this->renderSection("content") ?>
			</div>

			<!-- Sticky Footer -->
			<?= $this->include('admin/templates/footer') ?>
		</div>
	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Bootstrap core JavaScript-->
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	<!-- Core plugin JavaScript-->
	<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

	<!-- Page level plugin JavaScript-->
	<!-- <script src="vendor/chart.js/Chart.min.js"></script>
	<script src="vendor/datatables/jquery.dataTables.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.js"></script> -->

	<!-- Custom scripts for all pages-->
	<script src="/js/sb-admin.min.js"></script>

	<!-- Demo scripts for this page-->
	<!-- <script src="js/demo/datatables-demo.js"></script>
	<script src="js/demo/chart-area-demo.js"></script> -->
</body>

</html>
