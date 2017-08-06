<?php
	class adminController extends ModelController
	{
		function showAction(){
			//session_start();
			//echo $_SESSION['resources']['username'];
			require VIEW_PATH . "admin.html";
		}
		function topAction(){
			require VIEW_PATH . "admin_top.html";
		}
		//function menuAction(){
		//	require VIEW_PATH . "admin_menu.html";
		//}
		function bottomAction(){
			require VIEW_PATH . "admin_bottom.html";
		}
		function mainAction(){
			require VIEW_PATH . "admin_main.html";
		}
		function destroyAction(){
			parent::unsetsession();
			parent::destroysession();
			//echo "你妹";
			//parent::gotoURL("注销成功！","index.php","2");
			//echo "<script>window.location.href ='./index.php'</script>";
			header("location:index.php");
		}
		function insertAction(){
			require VIEW_PATH . "admin_info_insert.html";
		}
		function admin_selectAction(){
			if(isset($_POST['select'])){
				$num = $_POST['num'];
				$obj = ModelFactory::M("adminModel");
				//die($obj);
				$result = $obj->admin_select($num);
				if($result){
					//var_dump($result);
					//die($result);
					require VIEW_PATH . "admin_info_show.html";
				}else{
					echo "<script>alert('学号不存在！')</script>";
					require VIEW_PATH . "admin_info_insert.html";
				}
			}
		}
		function backAction(){
			//echo "席吧";
			require VIEW_PATH . "admin_info_insert.html";
		}
		function admin_updateAction(){
			if(isset($_POST['update'])){
				$number = $_POST['number'];
				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$date = $_POST['date'];
				$major = $_POST['major'];
				$mark = $_POST['mark'];
				$other = $_POST['other'];
				$upload = new upload();
				$result = $upload->uploadFile($_FILES['file']);
				if($result){
					$photo = $result;
				}else{
					echo $upload->geterror_info();
				}
				$obj = ModelFactory::M("adminModel");
				if($number == '' || $name == '' || $sex == '' || $date == '' || $major == '' || $mark == '' ){
					echo "<script>alert('添加的信息不全面!')</script>";
					require VIEW_PATH . "admin_info_insert.html";
				}else{
					$date = $obj->admin_update($number,$name,$sex,$date,$major,$mark,$other,$photo);
					echo "<script>alert('学生信息修改成功！')</script>";
					require VIEW_PATH . "admin_info_insert.html";
				}
			}
		}
		function admin_deleteAction(){
			if(isset($_POST['delete'])){
				$number = $_POST['number'];
				$obj = ModelFactory::M("adminModel");
				$date = $obj->admin_delete($number);
				echo "<script>alert('信息删除成功！')</script>";
				require VIEW_PATH . "admin_info_insert.html";
			}
		}
		function admin_insertAction(){
			if(isset($_POST['insert'])){
				$number = $_POST['number'];
				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$date = $_POST['date'];
				$major = $_POST['major'];
				$mark = $_POST['mark'];
				$other = $_POST['other'];
				$upload = new upload();
				$result = $upload->uploadFile($_FILES['file']);
				if($result){
					$photo = $result;
				}else{
					echo $upload->geterror_info();
				}
				$obj = ModelFactory::M("adminModel");
				if($number == '' || $name == '' || $sex == '' || $date == '' || $major == '' || $mark == '' ){
					echo "<script>alert('请认真看好所有项!')</script>";
					require VIEW_PATH . "admin_info_insert.html";
				}else{
					$date = $obj->admin_insert($number,$name,$sex,$date,$major,$mark,$other,$photo);
					echo "<script>alert('学生信息添加成功！')</script>";
					require VIEW_PATH . "admin_info_insert.html";
				}
			}
		}
		function student_selectAction(){
			require VIEW_PATH . "admin_student_select.html";
		}
		function stu_selectAction(){
			if(isset($_POST['button'])){
				$number = $_POST['number'];
				$name = $_POST['name'];
				if($_POST['major'] == 2){
					$major = "计算机";
				}else if($_POST['major'] == 3){
					$major = "通信工程";
				}else if($_POST['major'] == 4){
					$major = "信息安全";
				}else{
					$major = "";
				}
				$obj = ModelFactory::M("adminModel");
				$data = $obj->stu_select($number,$name,$major);
				//$data1 = &$data;
				$result = array();
				while($arr = mysql_fetch_array($data)){
						$result[] = $arr;
				}
				//var_dump($result);
				//die();
				//echo "席吧";
				if($result){
					$smarty = new Smarty();
					//$smarty = $this->smarty();
					$smarty->assign("result",$result);
					$smarty->assign("number",$number);
					$smarty->assign("name",$name);
					$smarty->display(VIEW_PATH . "admin_student_select_show.html");
				}else{
					echo "<script>alert('啊席吧,没找到呢 !-- ')</script>";
					require VIEW_PATH . "admin_student_select.html";
				}
			}
		}
		function mark_insertAction(){
			require VIEW_PATH . 'admin_student_mark_select.html';
		}
		function mark_selectAction(){
			if(isset($_POST['button'])){
				if($_POST['classname'] == 1){
					$classname = "计算机基础";
				}else if($_POST['classname'] == 2){
					$classname = "程序设计与语言";
				}else if($_POST['classname'] == 3){
					$classname = "离散数学";
				}else if($_POST['classname'] == 4){
					$classname = "数据结构";
				}else if($_POST['classname'] == 5){
					$classname = "计算机原理";
				}else if($_POST['classname'] == 6){
					$classname = "操作系统";
				}else if($_POST['classname'] == 7){
					$classname = "数据库原理";
				}else if($_POST['classname'] == 8){
					$classname = "计算机网络";
				}else if($_POST['classname'] == 9){
					$classname = "软件工程";
				}else{
					$classname = "";
				}
				if($_POST['major'] == 1){
					$major = "计算机";
				}else if($_POST['major'] == 2){
					$major = "通信工程";
				}else if($_POST['major'] == 3){
					$major = "信息安全";
				}else{
					$major = "";
				}
				if($classname == "" || $major == ""){
					echo "<script>alert('啊席吧！你还没填完必填项呢 ^_^')</script>";
					require VIEW_PATH . 'admin_student_mark_select.html';
				}else if($classname == "" && $major == ""){
					echo "<script>alert('啊席吧！你还没填完必填项呢 ^_^')</script>";
					require VIEW_PATH . 'admin_student_mark_select.html';
				}else{
					//echo "席吧";
					$obj = ModelFactory::M("adminModel");
					$result = $obj->mark_select($classname,$major);
					if($result){
						//var_dump($result);
						require VIEW_PATH . 'admin_student_mark_show.html';
					}else{
						echo "<script>alert('啊席吧！没找到你想要的信息呢')</script>";
						require VIEW_PATH . 'admin_student_mark_select.html';
					}
				}
			}
		}
		function student_mark_updateAction(){
			$id = $_GET['id'];
			$cj = $_GET['cj'];
			$classname = $_GET['classname'];
			//var_dump($id);
			//die();
			$obj = ModelFactory::M("adminModel");
			$result = $obj->mark_update($id,$cj,$classname);	
			echo "<script>alert('修改成功！^_^ ')</script>";
			require VIEW_PATH . 'admin_student_mark_select.html';
		}
		function student_mark_deleteAction(){
			$id = $_GET['id'];
			$classname = $_GET['classname'];
			$obj = ModelFactory::M("adminModel");
			$result = $obj->mark_delete($id,$classname);
			echo "<script>alert('删除成功！^_^ ')</script>";
			require VIEW_PATH . 'admin_student_mark_select.html';
		}
		function student_mark_selectAction(){
			require VIEW_PATH . 'admin_student_mark_select_show.html';
		}
		function student_mark_showsAction(){
			//die('席吧');
			if(isset($_POST['button'])){
				$number = $_POST['number'];
				//die('尼玛逼');
					//die("尼玛逼");
					$obj = ModelFactory::M("adminModel");
					$result1 = $obj->student_mark_cjbshow($number);	
					$result2 = $obj->student_mark_xsbshow($number);
					//var_dump($result1);
					//die($result1);
					if($result1 || $result2){
						//echo "yoooooo";
						//die(var_dump($result1));
						$smarty = new Smarty();
						//$smarty = $this->smarty();
						$smarty->assign("result1",$result1);
						$smarty->assign("result2",$result2);
						//var_dump($result2);
						//die($result2);
						$smarty->display(VIEW_PATH . 'admin_student_mark_select_shows.html');
						//require VIEW_PATH . 'admin_student_mark_select_shows.html';
					}else{
						echo "<script>alert('查询为空 \\\(▔＾▔)/ ')</script>";
						require VIEW_PATH . 'admin_student_mark_select_show.html';
					}
			}
		}
	}
?>