<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class BaseController extends Controller
{

    public function PostLoginRequest(){
        $client = new Client([
            // 'base_uri' => 'https://reqres.in' //// GET REQUEST URL
            'base_uri' => 'http://127.0.0.1:8000' // indicate url of request
        ]);

        // GET REQ
        // $response = $client->request('GET', '/api/users', [
        //     'query' => [
        //         'page' => '2'
        //     ]
        // ]);

          $response = $client->request('POST', '/api/login', [
            'query' => [
                'email' => 'jamesboy@gmail.com',
                'password' => 'admin'
            ]
        ]);

        $body = $response->getBody();
        $response_code = $response->getStatusCode();
        $arr_body = json_decode($body);
        // return $arr_body;
        header('Content-Type: application/json');
        return response([
            'data' =>  $arr_body,
            // 'status_code' => $response->getUrl()
       ]);
    }
}
