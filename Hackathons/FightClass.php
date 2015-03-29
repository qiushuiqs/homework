<?php 

class Fight extends Status{

	
	private $damage;
	
	public function __construct($a, $b){
		 $this->avatar = $a;
		 $this->undertake = $b;
	}
	
	public function avatarFirst(){
		if($this->avatar['Initiative']>$this->undertake['Initiative']){
			return 1;
		}else{
			return 0;
		}
	}
	
	private function attack($a,$b){
		$damage = $a['Damage'];
		$seed = rand(1,100);
		if($seed<$a['Critical']){
			$damage = $damage*2;
		}
		$seed = rand(1,100);
		if($seed<$b['Dodge']){
			$damage = 0;
		}
		return $damage;
	}
	
	public function strike(){
		if(!$this->isAttackOver($this->avatar['Attacks'])){
			$damage= $this->attack($this->avatar,$this->undertake);
			$undamage = $this->undertake['Health'];
			$this->undertake['Health'] -= $damage;
			$this->avatar['Attacks'] --;
			echo $this->avatar['Name']." hits ".$this->undertake['Name']." for $damage damage ($undamage->".$this->undertake['Health'].")<br>";
			return $damage;
		}else{
			return -1;
		}
	}	
	public function strike_back(){
		if(!$this->isAttackOver($this->undertake['Attacks'])){
			$damage= $this->attack($this->undertake,$this->avatar);
			$undamage = $this->avatar['Health'];
			$this->avatar['Health'] -= $damage;
			$this->undertake['Attacks'] --;
			echo $this->undertake['Name']." hits ".$this->avatar['Name']." for $damage damage ($undamage->".$this->avatar['Health'].")<br>";
			return $damage;
		}else{
			return -1;
		}
	}
	
	public function isDead(){
		if($this->undertake['Health']<=0){
			return 2;
		}
		if($this->avatar['Health']<=0){
			return 1;
		}
		return 0;
	}
	
	private function isAttackOver($times){
		return $times==0;
	}
	
	public function getHp($avatar){
		return $avatar?$this->avatar['Health']:$this->undertake['Health'];
	}
}