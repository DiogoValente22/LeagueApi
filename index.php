<?php

require('LeagueApi.php');

$summonerApi = new SummonerApi();
$summoner = $summonerApi->getSummonerByName('diogo');

$summonerId = $summoner['id'];
$summonerAccountId = $summoner['accountId'];
$summonerPuuid = $summoner['puuid'];
$summonerName = $summoner['name'];
$summonerProfileIconId = $summoner['profileIconId'];
$summonerLevel = $summoner['summonerLevel'];

print_r($summoner);




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Riot Api Test</title>
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
        

    </body>
</html>