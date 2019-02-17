<?php
	/*
	*		文件名:common.class.php
	*		概要: 通用管理类.
	*/
	class Common {
		static function sizeCount($bytes) {       	 	     //自定义一个文件大小单位转换函数
			if ($bytes >= pow(2,40)) {      		     //如果提供的字节数大于等于2的40次方，则条件成立
				$return = round($bytes / pow(1024,4), 2);    //将字节大小转换为同等的T大小
				$suffix = "TB";                        	     //单位为TB
			} elseif ($bytes >= pow(2,30)) {  		     //如果提供的字节数大于等于2的30次方，则条件成立
				$return = round($bytes / pow(1024,3), 2);    //将字节大小转换为同等的G大小
				$suffix = "GB";                              //单位为GB
			} elseif ($bytes >= pow(2,20)) {  		     //如果提供的字节数大于等于2的20次方，则条件成立
				$return = round($bytes / pow(1024,2), 2);    //将字节大小转换为同等的M大小
				$suffix = "MB";                              //单位为MB
			} elseif ($bytes >= pow(2,10)) {  		     //如果提供的字节数大于等于2的10次方，则条件成立
				$return = round($bytes / pow(1024,1), 2);    //将字节大小转换为同等的K大小
				$suffix = "KB";                              //单位为KB
			} else {                     			     //否则提供的字节数小于2的10次方，则条件成立
				$return = $bytes;                            //字节大小单位不变
				$suffix = "Byte";                            //单位为Byte
			}
			return $return ." " . $suffix;                       //返回合适的文件大小和单位
		}
	}

?>
