<?php
	header("Content-type:text/html;Charset=gb2312");
	
	//��һ��ʹ�ó���smarty
	include'./libs/Smarty.class.php';
	
	$smarty = new Smarty();
	
	//��samrty�����򵥵�����
	//$smarty->left_delimiter  = "<<";
	//$smarty->right_delimiter = ">>";
	
	//�޸��ļ�Ŀ¼����
	//$smarty->setTemplateDir("./View/");
	//$smarty->setCompileDir("./View_c/");
	
	//���ʣ���addr,name����Ϊsmarty�������Ե�һ����
	//���棺��addr,name���ݸ�ģ���Ա�ʹ��
	$smarty->assign("addr","�Ĵ�ʡ�ɶ���");
	$smarty->assign("name","����");
	$smarty->assign("hobby","blue");
	$smarty->assign("arr",array(1,2,3,4,5,6));
	$smarty->assign("arr1",array("sichuan"=>"monkey","chengdu"=>"caonima","haiyang"=>"shayu"));
	//$smarty->assign("arr2",array("a"=>"����","b"=>"����","c"=>"����","d"=>"ƹ����"));
	$smarty->assign("select","sichuan");
	//$smarty->assign("output",array("����","����","����","ƹ����"));
	//$smarty->assign("value",array(1,2,3,4));
	$smarty->assign("opcity",array("a"=>"����","b"=>"�Ϻ�"));
	
	
	$smarty->display('01.html');