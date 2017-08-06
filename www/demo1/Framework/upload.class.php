<?php
	class upload{
		private $max_size = 1048576;
		private $ext_list = array('.jpeg','.png','.gif','.jpg');
		private $upload_path = "./";
		private $prefix = "";
		//存储错误的信息
		private $error_info = "";
		public function setext_list($ext_list){
			$this->ext_list = $ext_list;
		}
		public function setmax_size($max_size){
			$this->max_size = $max_size;
		}
		public function setupload_path($upload_path){
			if(is_dir($upload_path)){
				$this->upload_path = $upload_path;
			}
		}
		public function setprefix($prefix){
			$this->prefix = $prefix;
		}
		//增加错误方法
		public function geterror_info(){
			return $this->error_info;
		}
		function uploadFile($info){
			//首先判断文件是否有错误
			if($info['error'] > 0){
				$this->error_info = "上传出现错误";
				return false;
			}
			//文件后缀的判断
			//$ext_list = array('.jpeg','.png','.gif','.jpg');
			$ext = strrchr($info['name'],'.');
			if(!in_array($ext,$this->ext_list)){
				$this->error_info = "文件后缀名出现错误";
				return false;
			}
			//mime的判断
			$mime_list = $this->ext2mime($this->ext_list);
			if(!in_array($info['type'],$mime_list)){
				$this->error_info = "文件mime类型错误";
				return false;
			}
			//真实类型的判断
			//实例化一个可以获取文件MIME_TYPE的对象
			$file_info = new Finfo(FILEINFO_MIME_TYPE);
			$real_mime = $file_info->file($info['tmp_name']);
			if(!in_array($real_mime,$mime_list)){
				$this->error_info = "文件的真实类型错误";
				return false;
			}
			//文件大小的判断
			//$max_size = 1024 * 1024;
			if($info['size'] > $this->max_size){
				$this->error_info = "上传文件的大小错误";
				return false;
			}
			//生成目标文件名
			$prefix = $this->prefix;
			$upload_filename = uniqid($prefix,true) . $ext;
			//指定上传的目录
			$upload_path = $this->upload_path;
			//一句天，划分目录是否存在
			//子目录名
			$sub_dir = date("Y-m-d") . "/";
			if(!is_dir($upload_path . $sub_dir)){
				mkdir($upload_path . $sub_dir);
			}
			//检测该文件是否为上传的该文件
			if(is_uploaded_file($info['tmp_name'])){
				$result = move_uploaded_file($info['tmp_name'],$upload_path . $sub_dir . $upload_filename);
				if($result){
					//此时函数的返回的部分也需要返回子目录的部分
					return $sub_dir . $upload_filename;
				}else{
					$this->error_info = "上传出现错误";
					return false;
				}
			}else{
				$this->error_info = "文件不是http post上传类型";
				return false;
			}
		}
		function ext2mime($ext_list){
			$ext2mime = require  FRAMEWORK . 'ext2mime.php';
			//return语句也可以用于该被载入文件载入时返回一个数据，形式为:return  XX数据
			$ext2_list = array();
			foreach($ext_list as $val){
				$ext2_list[] = $ext2mime[$val];
			}
			return $ext2_list;
		}
	}