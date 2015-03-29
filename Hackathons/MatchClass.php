<?php

class Match{
	
	private $matchInfo = array();
	protected $players = array();
	protected $battle;
	
	public function __construct(){
		$this->loadingPlayers("./applicants.csv");
		$this->battle = new Battle();
	}
	
	protected function loadingPlayers($fileAddr){
		//$fileAddr = "G:/wamp/www/Hackathons/applicants.csv";
		$rowNum=0;
		$title =array();
		$handle = fopen($fileAddr,"r");
		while($row = fgetcsv($handle,1000,',')){
			if($rowNum == 0){
				$title = $row;
			}else{
				$palyer = array();
				for($i=0; $i<count($row); $i++){
					$player[$title[$i]] = $row[$i];
				}
				array_push($this->players, $player);	
			}
			$rowNum++;
		}
	}
	
	public function listPlayers(){
		print_r($this->players);
	}
		
	public function runnningMatch(){
		$numOfPlayers = count($this->players);
		foreach($this->players as $key=>$value){
			$this->matchInfo[$value['Name']] = 0;
		}
		foreach($this->players as $key=>$value){
			for($i=$key+1; $i<$numOfPlayers; $i++){
				//echo "$key Vs $i <br />";
				if($this->battle->goFight($this->players[$key],$this->players[$i])==2){
					$this->matchInfo[$value['Name']]++;
				}else{
					$this->matchInfo[$this->players[$i]['Name']]++;
				}
			}
		}
	}

	public function whoIsWinner(){
		//sort($this->matchInfo, SORT_NUMERIC);
		print_r($this->matchInfo);
		$sortable = array_values($this->matchInfo);
		$index =0;
		$max = array($index=> $sortable[0]);
		for($i=1; $i<count($sortable);$i++){
			if($sortable[$i]>$max[$index]){
				$index = $i;
				$max[$index] = $sortable[$i]; 
			}
		}
		echo "Final Winners:<br>";
		echo implode(',',array_keys($this->matchInfo,$max[$index]))." has ".$max[$index]." victories!";
	}
}

