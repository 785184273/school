<!--
	php�������
-->
<html>
	<head>
		<title>
			PHP��Ķ����ʹ��
		</title>
	</head>
	<body>
		<?php 
			/*
				����һ����
				1��������Ļ�����ʽ��class ����{
					��Ա����; //����
					��Ա����;
				}
				2��ʹ���ࣺ���봴���������ʹ�ã�$������ = new ����();
					--�������еĳ�Ա��$������->��Ա�������������Ƿ�������
						--��Ա���Եķ��ʣ�һ��ʹ��set�����������ã�ʹ��get�������л�ȡ
							--public funcntion set+������($������)
							--public funcntion get+������()
						--��Ա����������ʱ��һ��public function ������(�����б�){}
				3�����췽�����������е�һ����Ա������ֻ�Ƿ�������������ͬ
					--�����ǣ��������󣬲���ʼ������
					--�ڴ�������ʱ�����Ը������е����Ը�ֵ
					--Ĭ�ϵĹ��췽�����޲����Ĺ���
				4�������е��ó�Ա�������߳�Ա����ʱʹ��this
			*/
			class Person{
				//�����Ա����
				var $name;
				var $high;
				var $weight;
				var $age;
				//���췽��
				public function Person($name){
					$this->name = $name;
				}
				//�����Ա����
				public function show(){
					echo ($this->name).($this->high).($this->weight).($this->age);
				}
				//�Գ�Ա���ԵĲ�������  get() ��ȡ������ set���������ó�Ա����ֵ�ķ���
				public function getName(){
					return $this->name;
				}
				public function setName($name){
					$this->name=$name;
				}
			}
			/*
				����һ����
			*/
			class Child extends Person {

			}
			//���ʹ��
			//$p = new Person();
			$p=new Person("1");
			$p1=new Person("1");
		//	$p->setName("dawang");	
			$p->show();  
			
		//	$c = new Child();
		//	$c->setName("wo shi waw ")��
		//	$c->show();
		?>
	</body>
</html>