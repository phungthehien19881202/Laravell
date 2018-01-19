<html>
	<head>
	</head>
	<body>
		<a href="index.php">Trở về danh sách</a>
		<form method="POST" action="add.php">
			<label>Nhập link ảnh</label><input name="img"/><br/>
			<label>Nhập tên</label><input name="name"/><br/>
			<label>Nhập title</label><input name="title"/><br/>
			<label>Nhập miêu tả</label><input name="des"/><br/>
			<input type="submit" value="Thêm" />
		</form>
		<?php 
		session_start();
		if(isset($_POST['img'])) {
			$img = $_POST['img'];
			$name = $_POST['name'];
			$title = $_POST['title'];
			$des = $_POST['des'];
			
			$project = array(
				"img" => $img,
				"name" => $name,
				"title" => $title,
				"des" => $des
			);
			
			$d = $_SESSION['ds_project'];
			$d[] = $project;
			$_SESSION['ds_project'] = $d;
		}
		
		?>
	</body>
</html>