<?php


class SummonerApi {

    private $baseUrl = 'https://br1.api.riotgames.com/lol/';
    private $apiKey = 'RGAPI-02eb5e3d-e5c1-4368-8823-9f5d2dd90204';

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

}

?>
