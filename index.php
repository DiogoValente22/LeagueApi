<?php
require('LeagueApi.php');


$summonerApi = new SummonerApi();

$name = $_GET['name'] ?? 'kami'; // default summoner: Kami
//summoner api v4
$summoner = $summonerApi->getSummonerByName($name);


if(isset($summoner)){

    $summonerId = $summoner['id'];
    $summonerName = $summoner['name'];
    $summonerProfileIconId = $summoner['profileIconId'];
    $summonerLevel = $summoner['summonerLevel'];

    //league api v4
    $league = $summonerApi->getLeagueById($summonerId);

    if(isset($league[0]['tier'])){

        $summonerTier = $league[0]['tier'];
        $summonerRank = $league[0]['rank'];
        $summonerLP = $league[0]['leaguePoints'];
        $summonerWins = $league[0]['wins'];
        $summonerLosses = $league[0]['losses'];
    
        $total = $summonerWins + $summonerLosses;
        $summonerWR = round(($summonerWins / $total) * 100, 1);

        $msg = "
    
            <div class='row'>
                    <div class='col-12 d-flex flex-column justify-content-center text-center'>
                        <div class='nickname text-white my-2'>
                            <span class='summonerName'>{$summonerName}</span><br><br>
                            <img src='http://ddragon.leagueoflegends.com/cdn/11.4.1/img/profileicon/{$summonerProfileIconId}.png' alt='' style='width: 124px;'>
                            <br>
                            <p><span class='text-dark'><strong>{$summonerLevel}</strong></span></p>
                        </div>
                    
                        <div>
                            <span style='color: #ccc;'>Solo/Duo</span>
                            <div class='tier'>
                                <img src='assets/img/emblem/$summonerTier.png' style='width: 100px; height: 114px;' alt='tier icon'>
                            </div>
                            <span class='text-white'>{$summonerTier} {$summonerRank}</span><br>
                            <br>
                            <div class='win-lose text-white'><p> {$summonerLP} LP / <span style='color: rgb(38, 224, 38)'>$summonerWins</span>W <span style='color: rgb(250, 37, 37);'>{$summonerLosses}</span>L</p></div>
                            <div class='winratio text-white'><span>Win Ratio {$summonerWR}%</span></div>
                        </div>
                    </div>
                </div>
                <div class='row form d-flex flex-column justify-content-center text-center'>
                    <div class='col-12'>
                        <p class='text-white'>most played champion:</p>
                        <p class='text-white'><span class='pink'>Nidalee</span> - 1000000 mastery</p>
                    </div>
                </div>
        
            ";

    }else {
        
        $msg = "
        
        <div class='row'>

            <div class='col-12 d-flex flex-column justify-content-center text-center'>
                <h2 class='text-white'>this summoner has no ranked matches!!</h2>
            </div>

        </div>

    ";

    }



}else {

    $msg = "
    
         <div class='row'>

                <div class='col-12 d-flex flex-column justify-content-center text-center'>
                    <h2 class='text-white'>404 - summoner not found</h2>
                </div>

        </div>

    ";

}


?> <!--END PHP -->

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

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
                <a class="navbar-brand" href="#">Diog<span class="pink">o</span></a>
                <form class="form-inline my-2 my-lg-0" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="name" placeholder="Summoner Name..." aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </nav>
        </header>
        
        <div class="container-fluid banner">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center m-4">League of Legends <span class="pink">API</span></h1>
                </div>
            </div>
            

            <?php
                echo $msg;
            ?>
            
           
            
        </div>


        <div class="copyrightText">
            <p>Copyright 2021 <a href="#">Diogo Valente</a>. All right Reserved</p>
        </div>

    </body>
</html>

<!-- http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Aatrox_1.jpg link to champion img -->
<!-- http://ddragon.leagueoflegends.com/cdn/11.4.1/img/profileicon/588.png link to icons img -->