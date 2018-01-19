<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>1 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		img {
			width: 100%;
		}
	</style>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
		<?php
		
		
		session_start();
		if(isset($_SESSION['login_name'])) {
			header("Location:index.php");
		}
		
		
		
		if(isset($_GET['msg'])) {
			echo "<div class='alert alert-danger'>".$_GET['msg']."</div>";
		}
		?>
		<h2> Nhập tên và mật khẩu để đăng nhập:
		</h2>
		<form method="POST" action="xulylogin.php">
			<div class="form-group">
			    <label class="sr-only" for="form-username">Username</label>
			    <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			</div>
			<div class="form-group">
			   <label class="sr-only" for="form-password">Password</label>
			   <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			</div>
			<button type="submit" class="btn">Sign in!</button>
		</form>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		$(document).ready(function() {
			$("#prj5").click(function() {
				$("#content5").load("demo.txt");
			});
		});
	</script>

</body>

</html>
