<?php
	//�����ռ�
	namespace Home\Controller;
	use Think\Controller;
	//header("content-type:text/html;charset=utf-8");
	//ǰ̨������
	//���� Controller:ThinkPHP/Library/Think/Controller.class.php
	class GoodsController extends Controller{
		//��¼����
		function showlist(){
			//echo "ϯ��";
			//����view��ͼ
			//$this->display();	//չ����ͼ(��ͼ�ļ������뵱ǰ������������һ��)
			$this->display("detail");	//���ʵ�ǰ�������µ�ģ���ļ�
			//$this->display("Index/index");	//���ʱ�Ŀ������µ�ģ���ļ�
		}
		//ע�Ṧ��
		function detail(){
			//echo "ϯ��";
			$this->display();
		}
	}