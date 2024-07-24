<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LocationId;


class ApiController extends Controller
{
    public function index()
    {
        // $token = '87cbS15JZe2lkOKL6bmaaD7c7o3SFKScyVrdpuaSuJgo6YiIXmrQJvzhLgEVbEg1R9F_ndwB2ZbzgVcuGBL9Uw==';

        // $response = Http::withHeaders([
        //     'Authorization' => 'Token ' . $token,
        //     'Content-Type' => 'application/json',
        // ])->post('https://us-east-1-1.aws.cloud2.influxdata.com/api/v2/dbrps', [
        //     'bucketID' => '8290b675d41a3dec',
        //     'database' => 'test',
        //     'default' => true,
        //     'orgID' => 'd2a61e2dba527bd8',
        //     'retention_policy' => 'rp',
        // ]);

        // $response = Http::withHeaders([
        //     'Authorization' => 'Token ' . $token,
        // ])->get('https://us-east-1-1.aws.cloud2.influxdata.com/query', [
        //     'db' => 'test',
        //     'q' => 'SELECT * FROM test.rp.counts;',
        // ]);
    
        // $data = $response->json()['results'][0]['series'][0];

        // $location_id = [];
    
        // foreach ($data['values'] as $values) {
        //     $location_id[] = $values[array_search('location_id', $data['columns'])];
        // }

        // dd($response->body(), $response->json(), $response->status());

        return LocationId::find(1)->name;

        return  $location_id;
    }
}
