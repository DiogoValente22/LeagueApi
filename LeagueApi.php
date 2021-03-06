<?php


class SummonerApi {

    private $baseUrl = 'https://br1.api.riotgames.com/lol/';
    private $apiKey = 'YOUR_KEY_HERE';
    

    public function getSummonerByName($summonerName) { // SUMMONER-V4 api

        $url = $this->baseUrl.'summoner/v4/summoners/by-name/'.$summonerName.'?api_key='.$this->apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;

    }

    public function getLeagueById($summonerId){ // LEAGUE-V4 apí | return all information like tier, rank, wins, losses, lp etc...

        $url = $this->baseUrl.'league/v4/entries/by-summoner/'.$summonerId.'?api_key='.$this->apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;

    }

    public function getMasteryById($summonerId) {
        
        $url = $this->baseUrl.'champion-mastery/v4/champion-masteries/by-summoner/'.$summonerId.'?api_key='.$this->apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;

    }

    public function getChampion(){

        $url = 'http://ddragon.leagueoflegends.com/cdn/11.5.1/data/en_US/champion.json';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;

    }

}
?>
