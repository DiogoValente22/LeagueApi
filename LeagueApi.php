<?php


class SummonerApi {

    private $baseUrl = 'https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/';
    private $apiKey = 'RGAPI-02eb5e3d-e5c1-4368-8823-9f5d2dd90204';

    public function getSummonerByName($summonerName) {

        $url = $this->baseUrl.$summonerName.'?api_key='.$this->apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        return $data;

    }

    public function

}




?>