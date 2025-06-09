<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        try {
            $url = "https://jsonplaceholder.typicode.com/users";
            $get = Http::get($url);
            if ($get->successful()) {
                $body = $get->body();
                $nea = json_decode($body, true);
                // echo "<pre>";
                // print_r($nea);
                $res_value = [];
                $i = -1;
                foreach ($nea as $key) {
                    $i += 1;
                    $fulladdress = $key['address']['street'] . ', ' . $key['address']['city'] . ', ' . $key['address']['zipcode'];
                    // echo $fulladdress."<br>";
                    $name = $key['name'];
                    $email = $key['email'];
                    $res_value[$i] = [
                        'name' => $name,
                        'email' => $email,
                        'address' => $fulladdress
                    ];
                }
                // echo "<pre>";
                // print_r($res_value);
                return view('welcome', ['res_value' => $res_value]);
            } else {
                $res = [
                    'error' => 'resource not found',
                    'status' => false
                ];
                return view('404');
            }
        } catch (Exception $e) {
            return view('404');
        }
    }
}
