<?php
	//ģ��������
	class MiniSmarty{
		public $template_dir = "./view/";	//ģ��Ŀ¼
		public $templatec_dir = "./viewc/";	//�����ļ�Ŀ¼
		//�������������ԣ����ڴ洢�ⲿ�ı�����Ϣ
		public $tpl_var = array();
		//���ⲿ��������Ϊ�ڲ����Ե�һ����
		function assign($k,$v){
			$this->tpl_var[$k] = $v;
		}
		function display($tpl){
			$result = $this->compile($tpl);
			require $result;
		}
		//����ģ���ļ�({}�滻Ϊphp���)
		function compile($tpl){
			$com_file = $this->templatec_dir . $tpl . ".php";
			$tpl_file = $this->template_dir . $tpl;
			//��"�Ѿ�����"�Ļ���ļ�
			//1.�жϻ���ļ��Ƿ����
			//2.����ļ����޸�ʱ�����ģ���ļ����޸�ʱ��
			if(file_exists($com_file) && filemtime($com_file) > filemtime($tpl_file)){
				return $com_file;
			}else{
				echo "new $com_file";
				//���ģ���ļ��ڲ����������
				$cont = file_get_contents($tpl_file);
				//echo $cont;
				//�滻:{  --- > < ?php echo
				//$cont = str_replace("{","<?php echo ",$cont);
				//echo $cont;
				
				//�滻:{  --- > < ?php $this->tpl_var['
				$cont = str_replace("{\$","<?php echo \$this->tpl_var['",$cont);
				
				//�滻:}  --- > ;? >
				//�滻:}  --- > '];? >
				$cont = str_replace("}","']; ?>",$cont);
				//echo $cont;
				//�����ɺõı�������(php+html�������)����һ���ļ�����
				file_put_contents($com_file,$cont);
				//�������ļ�
				return $com_file;
			}
		}
	}
?>
<!--
	ģ��������Ż�
		1.����ļ�һ�����ɺã���Ҫ��������ֱ������		2.��ÿ��Ӧ�ö�����һ������ļ���ִ��֮ǰ���ж��Ƿ���ڣ�������ھ�ֱ���������������
		3.�����Ӧ��ģ�����޸ģ���Ӧ�Ļ���ļ�����Ҫ��������
		4.
-->