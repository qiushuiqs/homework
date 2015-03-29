<?php

class Status{
	protected $avatar = array();
	protected $undertake =array();
	protected $data =array();	
	
	//用魔术方法读取DATA信息
	public function __get($key){
		if(array_key_exists($key, $this->data)){
			return $this->data[$key];
		}else
			return null;
	}
	
	//用魔术方法动态增加或改变DATA信息
	public function __set($key, $value){
		$this->data[$key] = $value;
	}
}