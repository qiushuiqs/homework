<?php

class Battle{
	
	public function __construct(){
		//$this->round = new Round($this->avatar,$this->undertake);
	}
	
	public function goFight($a,$b){
		echo implode(',',array_keys($a))."<br>";
		echo implode(',',$a)."<br>";
		echo implode(',',$b)."<br>";
		$turn  = new Round($a,$b);
		$result = $turn->roundProcess();
		$n=1;
		while($result==0){
			$n++;
			$turn->refreshStatus();
			//exit;
			$turn->setRoundNum($n);
			$result = $turn->roundProcess();
		}
		if($result==1){
			echo $b['Name']." wons <br/>";
		}else if($result == 2){
			echo $a['Name']." wons <br/>";
		}else{
			echo "Fucking Draw? <br/>";
		}
		return $result;
	}
}