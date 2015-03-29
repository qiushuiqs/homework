<?php
require "StatusClass.php";
require "FightClass.php";
require "RoundClass.php";
require "BattleClass.php";
require "MatchClass.php";


$game = new Match();
//$game->loadingPlayers('');
//$game->listPlayers();
$game->runnningMatch();
$game->whoIsWinner();