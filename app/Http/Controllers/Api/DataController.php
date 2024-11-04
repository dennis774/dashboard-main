<?php

namespace App\Http\Controllers\Api;

use App\Models\ChartData;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function refreshData() {
        $client = new Client();
        $response = $client->request('GET', env('MY_API_URL', '').'/api/data');
        $body_contents = json_decode($response->getBody()->getContents());
        // dd($body_contents);

        ChartData::truncate();
        $array_of_data = [];

        foreach ($body_contents->data as $content) {
            // dd($content);
            array_push($array_of_data, [
                'cash' => $content->cash,
                'gcash' => $content->gcash,
                'total_remittance' => $content->total_remittance,
                'date' => $content->date,
            ]);
        }
        ChartData::insert($array_of_data);

        // return response()->json([
        //     'succesful' => true,
        //     // 'data' => $data
        // ]);
        return redirect()->back()->with('success', 'Data refreshed successfully!');
    }
}