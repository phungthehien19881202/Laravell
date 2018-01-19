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
	<?php
	session_start();
	if(!isset($_SESSION['login_name'])) {
		header("Location:login.php");
	}
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
					<li>
                        <a href="add.php">Add</a>
                    </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="#">Xin chào <?php echo $_SESSION['login_name']?></a>
                    </li>
                    <li>
                        <a href="xulylogout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
	
		<div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

		<hr/>
		<?php
			$search = "";
			if(isset($_GET['search'])) {
				$search = $_GET['search'];
			}
		?>
		<div >
			<form method="GET" action="index.php">
				<div class="form-group">
				<input class="form-username form-control" type="text" name="search" 
				value="<?php echo $search?>"
				/>
				</div>
				<input class="btn btn-default" type="submit" value="Tìm kiếm" />				
			</form>
		</div>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

		<?php
		if(isset($_SESSION['ds_project'])) {
			$ds_project = $_SESSION['ds_project'];
		} else {
			$ds_project = array(
				array(
					"img" => "http://placehold.it/700x300",
					"name" => "Project One",
					"title" => "May tinh HP",
					"des" => "fdfdfdfdfdfdfd"
				),
				array(
					"img" => "http://placehold.it/700x300",
					"name" => "Project Two",
					"title" => "May tinh Mac",
					"des" => "fdfdfdfdfdfdfd"
				),
				array(
					"img" => "http://placehold.it/700x300",
					"name" => "Project Three",
					"title" => "Dien thoai iPhone",
					"des" => "fdfdfdfdfdfdfd"
				)
			);
			$_SESSION['ds_project'] = $ds_project;
		}
		
		$result = array();
		if($search == null || $search == "") {
			$result = $ds_project;
		} else {
			for($i = 0; $i < count($ds_project); $i++) {
				$project = $ds_project[$i];
				
				$name_project = strtolower($project['name']);
				$key_search = strtolower($search);
				
				if(strpos($name_project, $key_search) !== FALSE) {
					$result[] = $project;
				}
			}
		}
		
		if(count($result) == 0) {
			echo "<h4 class='alert alert-success'>Không có kết quả nào.</h4>";
		}
		
		$item_per_page = 2;
		$total_page = count($result)/$item_per_page;
		
		$page = 1;
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		
		$s = ($page - 1) * $item_per_page;
		$e = $s + $item_per_page;
		
		for($i = $s; $i < $e ; $i++) {
			$project = $result[$i];
		?>
                <!-- Project One -->
                <div class="row">
                    <div class="col-md-7">
                       <img class="img-responsive" src="<?php echo $project['img']?>" alt="">
                       
                    </div>
                    <div class="col-md-5">
                        <h3><?php echo $project['name']?></h3>
                        <h4><?php echo $project['title']?></h4>
                        <p><?php echo $project['des']?></p>
                        <a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                <!-- /.row -->

                <hr>

		<?php 
		}
		?>
       

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
					
					<?php
					for($i = 0; $i < $total_page; $i++) {
					?>
                    <li>
<a href="index.php?page=<?php echo ($i + 1)?>&search=<?php echo $search ?>"><?php echo ($i + 1)?></a>
                    </li>
					<?php 
					}
					?>
					
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

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
