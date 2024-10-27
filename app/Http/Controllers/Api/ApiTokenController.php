<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiToken;

class ApiTokenController extends Controller
{
    public function getApiToken() {
        $client = new Client();
        $response = $client->request('GET', env('MY_API_URL', '').'/api/token');
        $body_contents = json_decode($response->getBody()->getContents());
        // dd($body_contents);

        ApiToken::truncate();
        $array_of_data = [];

        foreach ($body_contents->data as $content) {
            // dd($content);
            array_push($array_of_data, [
                'token' => $content->token,
            ]);
        }
        ApiToken::insert($array_of_data);

        return response()->json([
            'succesful' => true,
            // 'data' => $data
        ]);
    }

}
