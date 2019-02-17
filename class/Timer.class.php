<?php
	/*
	*		文件名:Timer.class.php
	*		概要: 脚本执行时间管理类.
	*/
	class Timer {                        		 //声明一个计算脚本运行时间的类
		private $startTime;               	 //保存脚本开始执行时的时间（以微秒的形式保存）
		private $stopTime;                	//保存脚本结束执行时的时间（以微秒的形式保存）

		function __construct(){            	//构造方法，在创建对象时初使化成员属性
			$this->startTime=0;          	//初使化成员属性startTime的值为0
			$this->stopTime=0;          	//初使化成员属性stopTime的值为0
			$this->start();
		}

		private function start(){                       //在脚本开始处调用获取脚本开始时间的微秒值
			$this->startTime = microtime(true);   	//将获取的时间赋给成员属性$startTime
		}

		function stop(){                       		//在脚本结束处调用获取脚本结束时间的微秒值
			$this->stopTime= microtime(true);   	//将获取的时间赋给成员属性$stopTime
		}
		function spent(){                      		//返回同一脚本中两次获取时间的差值
			return round(($this->stopTime- $this->startTime) , 4);  //计算后以4舍5入保留4位返回
		}
	}
?>