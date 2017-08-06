<?php
	class adminController extends ModelController
	{
		function showAction(){
			require VIEW_PATH . "index_content.html";
		}
		function show_detailsAction(){
			require VIEW_PATH . "index_menu.html";
		}
		function show_details_baiduAction(){
			require VIEW_PATH . "index_menu_baidu.html";
		}
		function show_resultlistAction(){
			require VIEW_PATH . "scan_resultlist.html";
		}
		function show_resultlist_baiduAction(){
			require VIEW_PATH . "baidu_resultlist.html";
		}
		function show_conf_keywordAction(){
			require VIEW_PATH . "conf_keyword.html";
		}
		function show_conf_listAction(){
			require VIEW_PATH . "conf_list.html";
		}
		function show_att_softAction(){
			require VIEW_PATH . "att_soft.html";
		}
		function show_history_bugAction(){
			require VIEW_PATH . "history_bug.html";
		}
		function show_conf_urlAction(){
			require VIEW_PATH . "conf_url.html";
		}
		//密码修改
		function update_user_changeAction(){
			parent::unsetsession();
			parent::destroysession();
			header("location:?p=front&c=Link&act=user_change");
		}
		//退出登录状态
		function destroyAction(){
			parent::unsetsession();
			parent::destroysession();
			header("location:index.php");
		}
		//ajax数据交互(关键字配置)
		function info_detailsAction(){
			$obj = ModelFactory::M("adminModel");
			$result = $obj->info_keyword();
			echo $result;
		}
		//Github和baidu关键字
		function gb_keywordAction(){
			$word = $_GET['word'];
			$obj = ModelFactory::M("adminModel");
			$result = $obj->select_gb_keyword($word);
			echo $result;
		}
		//github信息展示和分页
		function github_keyword_detailsAction(){
			$key_word = $_GET['name'];
			$pageno = $_GET['pageno'];
			$pagestart = ($pageno - 1) * 10;
			$pageend = 10;
			$obj = ModelFactory::M("adminModel");
			$result = $obj->github_keyword_details($key_word,$pageno,$pagestart,$pageend);
			echo $result;
		}
		//百度信息展示和分页
		function baidu_keyword_detailsAction(){
			$key_word = $_GET['name'];
			$pageno = $_GET['pageno'];
			$pagestart = ($pageno - 1) * 10;
			$pageend = 10;
			$obj = ModelFactory::M("adminModel");
			$result = $obj->baidu_keyword_details($key_word,$pageno,$pagestart,$pageend);
			echo $result;
		}
		//删除关键字
		function info_keyword_deleteAction(){
			$word = $_GET['name'];
			$type = $_GET['type'];
			$obj = ModelFactory::M("adminModel");
			$result = $obj->keyword_delete($word,$type);
			if($result){
				echo "删除成功!";
			}else{
				echo "删除失败!";
			}
		}
		//关键字添加之前查询
		function keyword_selectAction(){
			$word = $_GET['name'];
			$type = $_GET['type'];
			$type = strtolower($type);
			$obj = ModelFactory::M("adminModel");
			$result = $obj->keyword_select($word,$type);
			echo $result;
		}
		//添加关键字
		function keyword_addAction(){
			$word = $_GET['name'];
			$type = $_GET['type'];
			$type = strtolower($type);
			$obj = ModelFactory::M("adminModel");
			$result = $obj->keyword_add($word,$type);
			if($result){
				echo "插入成功";
			}else{
				echo "插入失败";
			}
		}
		function select_url_nameAction(){
			$obj = ModelFactory::M("adminModel");
			$result = $obj->url_name();
			echo $result;
		}
		
		function delete_urlAction(){
			$date = $_POST['date'];	
			$obj = ModelFactory::M("adminModel");
			$result = $obj->delete_url($date);
			if($result){
				echo "数据删除成功";
			}else{
				echo "数据删除失败";
			}
		}
		function insert_urlAction(){
			$url = $_POST['url'];
			$cookie = $_POST['cookie'];
			$desc = $_POST['desc'];
			$hzd = $_POST['hzd'];
			$date = $_POST['date'];
			$obj = ModelFactory::M("adminModel");
			$result = $obj->insert_url($url,$cookie,$desc,$hzd,$date);
			if($result){
				echo "数据添加成功";
			}else{
				echo "数据添加失败,url可能已经存在";
			}
		}
		function update_urlAction(){
			$url = $_POST['url'];
			$cookie = $_POST['cookie'];
			$desc = $_POST['desc'];
			$hzd = $_POST['hzd'];
			$date = $_POST['date'];
			$obj = ModelFactory::M("adminModel");
			$result = $obj->update_url($url,$cookie,$desc,$hzd,$date);
			if($result){
				echo "数据修改成功";
			}else{
				echo "数据修改失败";
			}
		}
		function show_url_numAction(){
			$obj = ModelFactory::M("adminModel");
			$result = $obj->url_num();
			echo $result;
		}
	}
?>