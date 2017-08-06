<?php
	class stuController extends ModelController{
		function showAction(){
			//echo "啊席吧";
			require VIEW_PATH . 'student.html';
		}
		function topAction(){
			require VIEW_PATH . "student_top.html";
		}
		//function menuAction(){
		//	require VIEW_PATH . "admin_menu.html";
		//}
		function bottomAction(){
			require VIEW_PATH . "student_bottom.html";
		}
		function mainAction(){
			require VIEW_PATH . "student_main.html";
		}
		function destroyAction(){
			parent::unsetsession();
			parent::destroysession();
			//echo "你妹";
			//parent::gotoURL("注销成功！","index.php","2");
			//echo "<script>window.location.href ='./index.php'<script>";
			header("location:index.php");
		}
		function student_mark_selectAction(){
			$username = $_GET['username'];
			$obj = ModelFactory::M("student_LoginModel");
			$result1 = $obj->student_mark_cjbshow($username);	
			$result2 = $obj->student_mark_xsbshow($username);
			//var_dump($result1);
			//die($result1);
			if($result1 || $result2){
			//echo "yoooooo";
			//die(var_dump($result1));
				require VIEW_PATH . 'student_mark_select_shows.html';
			}else{
				echo "<script>alert('查询为空 \\\(▔＾▔)/ ')</script>";
				//require VIEW_PATH . 'admin_student_mark_select_show.html';
			}
		}
	}
?>