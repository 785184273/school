<?php
	//�����ռ�
	namespace Home\Controller;
	use Think\Controller;
	//header("content-type:text/html;charset=utf-8");
	//ǰ̨������
	//���� Controller:ThinkPHP/Library/Think/Controller.class.php
	class UserController extends Controller{
		//��¼����
		function login(){
			//echo "ϯ��";
			//����view��ͼ
			$this->display();	//չ����ͼ(��ͼ�ļ������뵱ǰ������������һ��)
		}
		//ע�Ṧ��
		function register(){
			//echo "ϯ��";
			$this->display();
		}
	}