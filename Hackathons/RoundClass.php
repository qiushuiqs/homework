<?php

class Round extends Status{
	
	public $roundNum;
	protected $fight;
	
	public function __construct($a, $b){
		$this->roundNum = 1;
		$this->avatar = $a;
		$this->undertake = $b;
		
	}
	
	public function setRoundNum($n){
		$this->roundNum = $n;
	}
	
	public function roundProcess(){
		$this->fight = new Fight($this->avatar,$this->undertake);
		echo "Round ".$this->roundNum."<br>";
		if($this->fight->avatarFirst()){
			$this->fight->strike();
		}
		while($this->fight->isDead()==0 && $this->fight->strike_back()!=-1){
			if($this->fight->isDead()!=0){
				break;
				return $this->fight->isDead();
			}
			$result = $this->fight->strike();
		}
		while($this->fight->isDead()==0 && $this->fight->strike()!=-1){
			if($this->fight->isDead()!=0){
				break;
				return $this->fight->isDead();
			}
			$this->fight->strike();
		}
		return $this->fight->isDead();
	}
	
	public function refreshStatus(){
		$this->avatar['Health'] = $this->fight->getHp(1);
		$this->undertake['Health'] = $this->fight->getHp(0);
		return array(
			'avatar' => $this->avatar,
			'undertake' => $this->undertake,
		);
	}
}