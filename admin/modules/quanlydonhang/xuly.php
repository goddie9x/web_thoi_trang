<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_giohang SET cart_status=0 WHERE code_cart='".$code_cart."'";
		//nếu tồn tại thì cập nhật cartstatus bằng 0
		$query = mysqli_query($mysqli,$sql_update);
		header('Location:../../index.php?action=quanlydonhang&query=lietke');
	}
