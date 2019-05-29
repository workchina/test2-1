<?php
	if(!empty($_POST["submit"])){
		if(!empty($_POST["name"]) && !empty($_POST["pwd"])){
			$preg = preg_match("/^[a-zA-Z]+$/", $_POST["name"]);
			if($preg){
				include "Myyunpan_function.php";
				$obj = new sqli();
				$array = array("name"=>$_POST["name"],"pwd"=>$_POST["pwd"]);
				$res = $obj->insert("testuser", $array);
				if($res > 0){
					$path = "./user/".$_POST["name"];
					mkdir($path);
					echo "<script>alert('注册成功！');location.href='login.php'</script>";
				}else{
					echo "<script>alert('注册失败!');location.href='reg.php'</script>";
				}
			}else{
				echo "<script>alert('用户名只能为英文!');location.href='reg.php'</script>";
			}
			
		}
	}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>注册</title>
	<style type="text/css">
		.header{width: 800px; height: 30px;margin: 0 auto; box-shadow: 0px 0px 5px black;}
		.headerul,.headeruser{list-style: none; padding: 0; margin: 0;  height: 30px;}
		.headerul{width: 80%;}
		.headeruser{width: 20%;}
		.headerul li,.headeruser li{float: left;  text-align: center; line-height: 30px;}
		.headerul li{width: 100px;}
		.headeruser li{width: 50%;}
		.headeruser{ float: right;}
		.header a{ text-decoration: none;  color: black;}
		.header a:hover{color: crimson;}
	</style>
</head>
<body>
	<div class="header">
			<ul class="headeruser">
				<li><a href="login.php">登录</a></li>
				<li><a href="#">注册</a></li>
			</ul>
			<ul class="headerul">
				<li><a href="#">首页</a></li>
			</ul>
		</div>
		<div style="width:800px; height:500px; margin: 0 auto; margin-top: 5px; text-align: center;">
			<h2>用户注册</h2>
			<form action="reg.php" method="post">
				<table style="width:300px;margin: 0 auto;">
					<tr>
						<td>用户名:</td><td><input type="text" name="name"/></td>
					</tr>
					<tr>
						<td>密码:</td><td><input type="text" name="pwd"/></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="注册"></td>
					</tr>
				</table>
			</form>
		</div>
</body>
