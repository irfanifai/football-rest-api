<?php

use GuzzleHttp\Client;

defined('BASEPATH') OR exit('No direct script access allowed');

class Football_model extends CI_Model {

    public function index()
    {
        $client = new Client();

        $response = $client->request ('GET', 'http://newsapi.org/v2/top-headlines', [
            'query' => [
                'country' => 'id',
                'category' => 'sports',
                'apiKey' => '5381ee48fd2c427ba90d84ffe2a0b844'
                ]
            ]);

        
            $result = json_decode($response->getBody()->getContents(), true);

            return $result['articles'];
            // var_dump($result['articles']);
            // die;
    }

    public function index_football()
    {
        $client = new Client();

        $data = [
            $uri = 'http://api.football-data.org/v2/competitions/BL1/standings',
            $header = array('headers' => array('X-Auth-Token' => '84b83f3a828e4e709dfc73c24b92b75b')),
            $response = $client->get($uri, $header),
            $json = $response->json()
        ];

        
        var_dump($data);
        die;
    }

}

/* End of file Football_model.php */
