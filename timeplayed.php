<?php

include 'header.php';




$summoner = $_POST["summoner"];
if (isset($summoner) && $summoner != "Summoner name...") {
  $summoner = strtolower($summoner);
  $summoner = str_replace(' ','', $summoner);
  $region   = $_POST["region"];
  header( 'Location: http://www.loltimeplayed.com/loading.php?region='.$region.'&summoner='.$summoner.'' );


}


?>





<?php


function ordinal($num) {
    $ones = $num % 10;
    $tens = floor($num / 10) % 10;
    if ($tens == 1) {
        $suff = "th";
    } else {
        switch ($ones) {
            case 1 : $suff = "st"; break;
            case 2 : $suff = "nd"; break;
            case 3 : $suff = "rd"; break;
            default : $suff = "th";
        }
    }
    $num = number_format($num,0,'.',',');
    return $suff;
}


$summoner         = $_GET["summoner"];
$region           = $_GET["region"];
$eph              = $_GET["eph"];


$originalsummoner = $summoner;
//$summoner = utf8_encode($summoner);


$jsonsmall        = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.4/summoner/by-name/'.$summoner.'?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$arraysmall       = json_decode($jsonsmall,true);

//the way this works is that the api returns cumulative data for all queues except ranked. So the no. of games gets overwritten with each further season request, EXCEPT for ranked games
$json           = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/'.$arraysmall[$summoner]['id'].'/summary?season=SEASON4&api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$s4complexarray = json_decode($json,true);

$json           = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/'.$arraysmall[$summoner]['id'].'/summary?season=SEASON3&api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$s3complexarray = json_decode($json,true);

$json           = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/'.$arraysmall[$summoner]['id'].'/summary?season=SEASON2015&api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$s5complexarray = json_decode($json,true);

$json           = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/'.$arraysmall[$summoner]['id'].'/summary?season=SEASON2016&api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$s6complexarray = json_decode($json,true);

$json           = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v1.3/stats/by-summoner/'.$arraysmall[$summoner]['id'].'/summary?season=SEASON2017&api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
$s7complexarray = json_decode($json,true);

$size3       = count($s3complexarray );
$size4       = count($s4complexarray );
$size5       = count($s5complexarray );
$size6       = count($s6complexarray );
$size7       = count($s7complexarray );
$simplearray = array();
$id = $arraysmall[$summoner]['id'];
$y  = 0;

if ($arraysmall[$summoner]['id'] > 0) {

  if ($size3 > 0) {

    foreach ($s3complexarray['playerStatSummaries'] as $q) {

      $ai     = 0;
      $ranked = 0;
      if ($q['playerStatSummaryType'] == 'OneForAll5x5') {
        $q['playerStatSummaryType'] = 'OneForAllMirror';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'CAP5x5') {
        $q['playerStatSummaryType'] = 'TeamBuilder';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 5v5';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedPremade3x3') {
        $q['playerStatSummaryType'] = 'S3 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedSolo5x5') {
        $q['playerStatSummaryType'] = 'S3 Ranked 5v5 Solo';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam3x3') {
        $q['playerStatSummaryType'] = 'S3 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam5x5') {
        $q['playerStatSummaryType'] = 'S3 Ranked 5v5 Team';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'Unranked') {
        $q['playerStatSummaryType'] = 'Normal 5v5';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Unranked3x3') {
        $q['playerStatSummaryType'] = 'Normal 3v3';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'OdinUnranked') {
        $q['playerStatSummaryType'] = 'Dominion';
        $gametime = 20;
      }

      if ($q['playerStatSummaryType'] == 'AramUnranked5x5') {
        $q['playerStatSummaryType'] = 'ARAM';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'URF') {
        $q['playerStatSummaryType'] = 'URF';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI3x3') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 3v3';
        $gametime = 20;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'SummonersRift6x6') {
        $q['playerStatSummaryType'] = 'Hexakill SR';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Hexakill') {
        $q['playerStatSummaryType'] = 'Hexakill TT';
        $gametime = 30;
      }


      if ($q['playerStatSummaryType'] == 'URFBots') {
        $q['playerStatSummaryType'] = 'URF Co-op vs AI';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'NightmareBot') {
        $q['playerStatSummaryType'] = 'NightmareBot';
        $gametime = 35;
        $ai       = 1;
      }



      $simplearray[$y]['GameType'] = $q['playerStatSummaryType'];

      if ($ranked == 0) {
        $q['losses'] = $q['wins'];
      }
      if ($ai == 1) {
        $q['losses'] = round($q['wins'] / 5) ;
      }

      $totalgames = $q['losses'] + $q['wins'];
      $simplearray[$y]['GamesPlayed'] = $totalgames;
      $simplearray[$y]['MinsPerGame'] = $gametime;
      $gamestime      = $totalgames * $gametime;
      $gamestimehours = $gamestime / 60;
      $simplearray[$y]['TotalTime'] = $gamestimehours;

      $y++;
    }

  }

  if ($size4 > 0) {

    foreach ($s4complexarray['playerStatSummaries'] as $q) {

      $position = 1000;
      $ai       = 0;
      $ranked   = 0;
      $y2       = $y;
      if ($q['playerStatSummaryType'] == 'OneForAll5x5') {
        $q['playerStatSummaryType'] = 'OneForAllMirror';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'CAP5x5') {
        $q['playerStatSummaryType'] = 'TeamBuilder';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 5v5';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedPremade3x3') {
        $q['playerStatSummaryType'] = 'S4 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedSolo5x5') {
        $q['playerStatSummaryType'] = 'S4 Ranked 5v5 Solo';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam3x3') {
        $q['playerStatSummaryType'] = 'S4 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam5x5') {
        $q['playerStatSummaryType'] = 'S4 Ranked 5v5 Team';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'Unranked') {
        $q['playerStatSummaryType'] = 'Normal 5v5';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Unranked3x3') {
        $q['playerStatSummaryType'] = 'Normal 3v3';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'OdinUnranked') {
        $q['playerStatSummaryType'] = 'Dominion';
        $gametime = 20;
      }

      if ($q['playerStatSummaryType'] == 'AramUnranked5x5') {
        $q['playerStatSummaryType'] = 'ARAM';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'URF') {
        $q['playerStatSummaryType'] = 'S4 URF';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI3x3') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 3v3';
        $gametime = 20;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'SummonersRift6x6') {
        $q['playerStatSummaryType'] = 'Hexakill SR';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Hexakill') {
        $q['playerStatSummaryType'] = 'Hexakill TT';
        $gametime = 30;
      }


      if ($q['playerStatSummaryType'] == 'URFBots') {
        $q['playerStatSummaryType'] = 'URF Co-op vs AI';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'NightmareBot') {
        $q['playerStatSummaryType'] = 'NightmareBot';
        $gametime = 35;
        $ai       = 1;
      }

      for ($i = 0; $i < $y;$i++) {
        if ($simplearray[$i]['GameType'] == $q['playerStatSummaryType']) {
          $position = $i;
        }
      }

      if ($position < 1000) {
        $y = $position;
      }

      $simplearray[$y]['GameType'] = $q['playerStatSummaryType'];

      if ($ranked == 0) {
        $q['losses'] = $q['wins'];
      }
      if ($ai == 1) {
        $q['losses'] = round($q['wins'] / 5) ;
      }

      $totalgames = $q['losses'] + $q['wins'];
      $simplearray[$y]['GamesPlayed'] = $totalgames;
      $simplearray[$y]['MinsPerGame'] = $gametime;
      $gamestime      = $totalgames * $gametime;
      $gamestimehours = $gamestime / 60;
      $simplearray[$y]['TotalTime'] = $gamestimehours;
      $y = $y2;
      $y++;
    }

  }

  if ($size5 > 0) {

    foreach ($s5complexarray['playerStatSummaries'] as $q) {

      $position = 1000;
      $ai       = 0;
      $ranked   = 0;
      $y2       = $y;
      if ($q['playerStatSummaryType'] == 'OneForAll5x5') {
        $q['playerStatSummaryType'] = 'OneForAllMirror';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'CAP5x5') {
        $q['playerStatSummaryType'] = 'TeamBuilder';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 5v5';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedPremade3x3') {
        $q['playerStatSummaryType'] = 'S5 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedSolo5x5') {
        $q['playerStatSummaryType'] = 'S5 Ranked 5v5 Solo';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam3x3') {
        $q['playerStatSummaryType'] = 'S5 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam5x5') {
        $q['playerStatSummaryType'] = 'S5 Ranked 5v5 Team';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'Unranked') {
        $q['playerStatSummaryType'] = 'Normal 5v5';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Unranked3x3') {
        $q['playerStatSummaryType'] = 'Normal 3v3';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'OdinUnranked') {
        $q['playerStatSummaryType'] = 'Dominion';
        $gametime = 20;
      }

      if ($q['playerStatSummaryType'] == 'AramUnranked5x5') {
        $q['playerStatSummaryType'] = 'ARAM';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'URF') {
        $q['playerStatSummaryType'] = 'S5 URF';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI3x3') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 3v3';
        $gametime = 20;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'SummonersRift6x6') {
        $q['playerStatSummaryType'] = 'Hexakill SR';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Hexakill') {
        $q['playerStatSummaryType'] = 'Hexakill TT';
        $gametime = 30;
      }


      if ($q['playerStatSummaryType'] == 'URFBots') {
        $q['playerStatSummaryType'] = 'URF Co-op vs AI';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'NightmareBot') {
        $q['playerStatSummaryType'] = 'NightmareBot';
        $gametime = 35;
        $ai       = 1;
      }

      for ($i = 0; $i < $y;$i++) {
        if ($simplearray[$i]['GameType'] == $q['playerStatSummaryType']) {
          $position = $i;
        }
      }

      if ($position < 1000) {
        $y = $position;
      }

      $simplearray[$y]['GameType'] = $q['playerStatSummaryType'];

      if ($ranked == 0) {
        $q['losses'] = $q['wins'];
      }
      if ($ai == 1) {
        $q['losses'] = round($q['wins'] / 5) ;
      }

      $totalgames = $q['losses'] + $q['wins'];
      $simplearray[$y]['GamesPlayed'] = $totalgames;
      $simplearray[$y]['MinsPerGame'] = $gametime;
      $gamestime      = $totalgames * $gametime;
      $gamestimehours = $gamestime / 60;
      $simplearray[$y]['TotalTime'] = $gamestimehours;
      $y = $y2;
      $y++;
    }

  }
  
  if ($size6 > 0) {

    foreach ($s6complexarray['playerStatSummaries'] as $q) {

      $position = 1000;
      $ai       = 0;
      $ranked   = 0;
      $y2       = $y;
      if ($q['playerStatSummaryType'] == 'OneForAll5x5') {
        $q['playerStatSummaryType'] = 'OneForAllMirror';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'CAP5x5') {
        $q['playerStatSummaryType'] = 'TeamBuilder';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 5v5';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedPremade3x3') {
        $q['playerStatSummaryType'] = 'S6 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedSolo5x5') {
        $q['playerStatSummaryType'] = 'S6 Ranked 5v5 Solo';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam3x3') {
        $q['playerStatSummaryType'] = 'S6 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam5x5') {
        $q['playerStatSummaryType'] = 'S6 Ranked 5v5 Team';
        $gametime = 35;
        $ranked   = 1;
      }
      
      if ($q['playerStatSummaryType'] == 'RankedFlexSR') {
        $q['playerStatSummaryType'] = 'S6 Ranked 5v5 Flex';
        $gametime = 35;
        $ranked   = 1;
      }
      
       if ($q['playerStatSummaryType'] == 'RankedFlexTT') {
        $q['playerStatSummaryType'] = 'S6 Ranked 3v3 Flex';
        $gametime = 30;
        $ranked   = 1;
      }     
      
      if ($q['playerStatSummaryType'] == 'Unranked') {
        $q['playerStatSummaryType'] = 'Normal 5v5';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Unranked3x3') {
        $q['playerStatSummaryType'] = 'Normal 3v3';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'OdinUnranked') {
        $q['playerStatSummaryType'] = 'Dominion';
        $gametime = 20;
      }

      if ($q['playerStatSummaryType'] == 'AramUnranked5x5') {
        $q['playerStatSummaryType'] = 'ARAM';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'URF') {
        $q['playerStatSummaryType'] = 'S6 URF';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI3x3') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 3v3';
        $gametime = 20;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'SummonersRift6x6') {
        $q['playerStatSummaryType'] = 'Hexakill SR';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Hexakill') {
        $q['playerStatSummaryType'] = 'Hexakill TT';
        $gametime = 30;
      }


      if ($q['playerStatSummaryType'] == 'URFBots') {
        $q['playerStatSummaryType'] = 'URF Co-op vs AI';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'NightmareBot') {
        $q['playerStatSummaryType'] = 'NightmareBot';
        $gametime = 35;
        $ai       = 1;
      }

      for ($i = 0; $i < $y;$i++) {
        if ($simplearray[$i]['GameType'] == $q['playerStatSummaryType']) {
          $position = $i;
        }
      }

      if ($position < 1000) {
        $y = $position;
      }

      $simplearray[$y]['GameType'] = $q['playerStatSummaryType'];

      if ($ranked == 0) {
        $q['losses'] = $q['wins'];
      }
      if ($ai == 1) {
        $q['losses'] = round($q['wins'] / 5) ;
      }

      $totalgames = $q['losses'] + $q['wins'];
      $simplearray[$y]['GamesPlayed'] = $totalgames;
      $simplearray[$y]['MinsPerGame'] = $gametime;
      $gamestime      = $totalgames * $gametime;
      $gamestimehours = $gamestime / 60;
      $simplearray[$y]['TotalTime'] = $gamestimehours;
      $y = $y2;
      $y++;
    }

  }
  
  if ($size7 > 0) {

    foreach ($s7complexarray['playerStatSummaries'] as $q) {

      $position = 1000;
      $ai       = 0;
      $ranked   = 0;
      $y2       = $y;
      if ($q['playerStatSummaryType'] == 'OneForAll5x5') {
        $q['playerStatSummaryType'] = 'OneForAllMirror';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'CAP5x5') {
        $q['playerStatSummaryType'] = 'TeamBuilder';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 5v5';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedPremade3x3') {
        $q['playerStatSummaryType'] = 'S7 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedSolo5x5') {
        $q['playerStatSummaryType'] = 'S7 Ranked 5v5 Solo';
        $gametime = 35;
        $ranked   = 1;
      }
      
     if ($q['playerStatSummaryType'] == 'RankedFlexSR') {
        $q['playerStatSummaryType'] = 'S7 Ranked 5v5 Flex';
        $gametime = 35;
        $ranked   = 1;
      }
      
    	if ($q['playerStatSummaryType'] == 'RankedFlexTT') {
        $q['playerStatSummaryType'] = 'S7 Ranked 3v3 Flex';
        $gametime = 30;
        $ranked   = 1;
      }     
      

      if ($q['playerStatSummaryType'] == 'RankedTeam3x3') {
        $q['playerStatSummaryType'] = 'S7 Ranked 3v3';
        $gametime = 30;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'RankedTeam5x5') {
        $q['playerStatSummaryType'] = 'S7 Ranked 5v5 Team';
        $gametime = 35;
        $ranked   = 1;
      }

      if ($q['playerStatSummaryType'] == 'Unranked') {
        $q['playerStatSummaryType'] = 'Normal 5v5';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Unranked3x3') {
        $q['playerStatSummaryType'] = 'Normal 3v3';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'OdinUnranked') {
        $q['playerStatSummaryType'] = 'Dominion';
        $gametime = 20;
      }

      if ($q['playerStatSummaryType'] == 'AramUnranked5x5') {
        $q['playerStatSummaryType'] = 'ARAM';
        $gametime = 25;
      }

      if ($q['playerStatSummaryType'] == 'URF') {
        $q['playerStatSummaryType'] = 'S7 URF';
        $gametime = 30;
      }

      if ($q['playerStatSummaryType'] == 'CoopVsAI3x3') {
        $q['playerStatSummaryType'] = 'Co-op vs AI 3v3';
        $gametime = 20;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'SummonersRift6x6') {
        $q['playerStatSummaryType'] = 'Hexakill SR';
        $gametime = 35;
      }

      if ($q['playerStatSummaryType'] == 'Hexakill') {
        $q['playerStatSummaryType'] = 'Hexakill TT';
        $gametime = 30;
      }


      if ($q['playerStatSummaryType'] == 'URFBots') {
        $q['playerStatSummaryType'] = 'URF Co-op vs AI';
        $gametime = 25;
        $ai       = 1;
      }

      if ($q['playerStatSummaryType'] == 'NightmareBot') {
        $q['playerStatSummaryType'] = 'NightmareBot';
        $gametime = 35;
        $ai       = 1;
      }

      for ($i = 0; $i < $y;$i++) {
        if ($simplearray[$i]['GameType'] == $q['playerStatSummaryType']) {
          $position = $i;
        }
      }

      if ($position < 1000) {
        $y = $position;
      }

      $simplearray[$y]['GameType'] = $q['playerStatSummaryType'];

      if ($ranked == 0) {
        $q['losses'] = $q['wins'];
      }
      if ($ai == 1) {
        $q['losses'] = round($q['wins'] / 5) ;
      }

      $totalgames = $q['losses'] + $q['wins'];
      $simplearray[$y]['GamesPlayed'] = $totalgames;
      $simplearray[$y]['MinsPerGame'] = $gametime;
      $gamestime      = $totalgames * $gametime;
      $gamestimehours = $gamestime / 60;
      $simplearray[$y]['TotalTime'] = $gamestimehours;
      $y = $y2;
      $y++;
    }

  }

  $sessionsPlayedS1 = 0;
  $sessionsPlayedS2 = 0;

  foreach ($simplearray as $key => $row) {
    $mid[$key] = $row['TotalTime'];
  }

  array_multisort($mid, SORT_DESC, $simplearray);

  $json       = file_get_contents('https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v2.5/league/by-summoner/'.$arraysmall[$summoner]['id'].'/entry?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0');
  $url        = 'https://'.$region.'.api.pvp.net/api/lol/'.$region.'/v2.5/league/by-summoner/'.$arraysmall[$summoner]['id'].'/entry?api_key=a7ce7ac9-5d2f-4ee3-8548-adfc3a81c8b0';
  $rankeddata = json_decode($json,true);
  $elo        = 0;

  $ch         = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $hello      = curl_exec($ch);
  $statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if ($statuscode == '200') {

    $betterrankeddata = $rankeddata[$arraysmall[$summoner]['id']];

    if ($arraysmall[$summoner]['id'] > 0) {

      foreach ($betterrankeddata as $entry) {
        if ($entry['queue'] == 'RANKED_SOLO_5x5') {
          $tier = $entry['tier'];
          $rank = $entry['entries'][0]['division'];
          $lp   = $entry['entries'][0]['leaguePoints'];
        }
      }

    }

  }


  if ($tier == 'BRONZE') {
    if ($rank == 'I') {
      $elo = 1115;
    }
    if ($rank == 'II') {
      $elo = 1045;
    }
    if ($rank == 'III') {
      $elo = 975;
    }
    if ($rank == 'IV') {
      $elo = 905;
    }
    if ($rank == 'V') {
      $elo = 835;
    }
  }
  if ($tier == 'SILVER') {
    if ($rank == 'I') {
      $elo = 1465;
    }
    if ($rank == 'II') {
      $elo = 1395;
    }
    if ($rank == 'III') {
      $elo = 1325;
    }
    if ($rank == 'IV') {
      $elo = 1255;
    }
    if ($rank == 'V') {
      $elo = 1185;
    }
  }
  if ($tier == 'GOLD') {
    if ($rank == 'I') {
      $elo = 1815;
    }
    if ($rank == 'II') {
      $elo = 1745;
    }
    if ($rank == 'III') {
      $elo = 1675;
    }
    if ($rank == 'IV') {
      $elo = 1605;
    }
    if ($rank == 'V') {
      $elo = 1535;
    }
  }
  if ($tier == 'PLATINUM') {
    if ($rank == 'I') {
      $elo = 2165;
    }
    if ($rank == 'II') {
      $elo = 2095;
    }
    if ($rank == 'III') {
      $elo = 2025;
    }
    if ($rank == 'IV') {
      $elo = 1955;
    }
    if ($rank == 'V') {
      $elo = 1885;
    }
  }
  if ($tier == 'DIAMOND') {
    if ($rank == 'I') {
      $elo = 2515;
    }
    if ($rank == 'II') {
      $elo = 2445;
    }
    if ($rank == 'III') {
      $elo = 2375;
    }
    if ($rank == 'IV') {
      $elo = 2305;
    }
    if ($rank == 'V') {
      $elo = 2235;
    }
  }
  if ($tier == 'MASTER') {
    $elo = 2550;
  }
  if ($tier == 'CHALLENGER') {
    $elo = 2585 + ($lp / 2);
  }

  $elo = $elo - 35;
  $elo = round($elo);



}
?>


<div class ="inputbox" >

  <br>
  <div class="form">
    <br>
    <form action="" method="post">
      <input  type="text" name="summoner" value="Summoner name..." onfocus="if(this.value == 'Summoner name...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Summoner name...'; }"/>
      <select name="region">
        <option value="euw">
          euw
        </option>
        <option value="na">
          na
        </option>
        <option value="eune">
          eune
        </option>
        <option value="br">
          br
        </option>
        <option value="lan">
          lan
        </option>
        <option value="las">
          las
        </option>
        <option value="oce">
          oce
        </option>
        <option value="ru">
          ru
        </option>
        <option value="tr">
          tr
        </option>
        <option value="kr">
          kr
        </option>
      </select><br><br>
      <input class="submit" type="submit" name="submit" value="Calculate time played"/>
    </form>
  </div>
  <br>
</div>

<div class="timeplayedtitle">
<div class="timeplayedtitletext">
  Time played for <?php echo $originalsummoner.' '.$region; ?>
</div><br>



<?php

$maxy      = $y;
$totaltime = 0;

if ($arraysmall[$summoner]['id'] > 0) {

  echo '<div class="timeplayedtabletext"></div>
  <div class="timeplayedtabletext"><b>GAMES</b></div>
  <div class="timeplayedtabletext"><b>ESTIMATED GAME TIME (MINS)</b></div>
  <div class="timeplayedtabletext"><b>TOTAL TIME (HRS)</b></div>
  </div>';
  echo '<div class="timeplayedtablebody">';

  for ($y = 0; $y < $maxy; $y++) {

    if ($simplearray[$y]['GamesPlayed'] != 0) {


      echo '

      <div class="timeplayedtabletext"><b>'.$simplearray[$y]['GameType'].'</b></div>
      <div class="timeplayedtabletext">'.$simplearray[$y]['GamesPlayed'].'</div>
      <div class="timeplayedtabletext">'.$simplearray[$y]['MinsPerGame'].'</div>
      <div class="timeplayedtabletext">'.number_format((float) $simplearray[$y]['TotalTime'],1,'.',',').'</div>';




      $totaltime = $totaltime + $simplearray[$y]['TotalTime'];
    }
  }

  echo '</div>';
  
  //data is stamped into database now, because it is required to be for the ranking to work
    mysql_connect("localhost", "wwwlolti_mcplums", "W965ds+-");
  mysql_select_db("wwwlolti_goons");
  mysql_query("REPLACE INTO Goons (summoner, region, tier, division, hours, summonerid) VALUES ('$summoner','$region', '$tier', '$rank', '$totaltime', '$id')");
  $no100 = mysql_query("SELECT Hours FROM Top100 ORDER BY Hours ASC LIMIT 1") or die(mysql_error());
  $no100 = mysql_fetch_row($no100);
  if ($no100[0] <= $totaltime) {
    mysql_query("REPLACE INTO Top100 (summoner, region, tier, division, hours, summonerid) VALUES ('$summoner','$region', '$tier', '$rank', '$totaltime', '$id')");
  }

$positionarrayglobal = mysql_query("select count(*) from Goons where Hours > (select Hours from Goons where summonerid = '$id')");
$positionglobal = mysql_fetch_array( $positionarrayglobal );
$positionglobal = $positionglobal[0] +1 ;
$positionglobalformatted = number_format($positionglobal,0,'.',',');

$positionarrayregion = mysql_query("select count(*) from Goons where Hours > (select Hours from Goons where summonerid = '$id' and Region = '$region') and Region = '$region'");
$positionregion = mysql_fetch_array( $positionarrayregion );
$positionregion = $positionregion[0] +1 ;
$positionregionformatted = number_format($positionregion,0,'.',',');

//echo $positionglobal;
//print_r ($positionregion)
//echo $positionregion;
//echo ordinal($positionregion);


  if ($elo != 0 ) {
    $eloperhour = $totaltime / $elo;
  }
  echo '<div class="timeplayedtitle"><br><div class="eloperhourtext">';
  
  echo'You are ranked '.$positionglobalformatted.'<sup>'.ordinal($positionglobal).'</sup>'.' in the world and '.$positionregionformatted.'<sup>'.ordinal($positionregion).'</sup>'.' in your region by time played. ';

//got rid of the below because the totaltimeplayedtext wasnt formatting correctly and I couldnt be bothered to figure out why
  if ($elo > 0) {
    echo 'You are in '.$tier.' '.$rank.' with estimated elo '.$elo.'. You have spent '.number_format((float) $eloperhour,1,'.',',').' hours earning each point of elo.';
  }
  
  echo '</div><div class="totaltimeplayedtexttest"><b>';

  echo number_format((float) $totaltime,0,'.',',').' hours<br>'.number_format((float) $totaltime / 24,1,'.',',').' days</b>';

  echo'</div><br><br></div>';






  echo '<div class="lossesarenotrecorded">Losses are
  not recorded except for ranked games, therefore in other queues total games has
  been estimated at 2 * wins (1.2 * wins for AI games). Does not include Season 1 and 2 ranked games at all as this is not available from the Riot API (riot pls?)</div>';

}
else {
  echo '<div class="timeplayedtitle"><div class="timeplayedtitletext">Summoner '.$originalsummoner.' ('.$region.') not found</div></div><br></div>';
}

?>

<br>
<?php
include 'footer.php';
?>



</body>


