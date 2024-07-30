<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\FetchUser;

class FetchApi extends Controller
{
    function index(){
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        if ($response->ok()) {
            $data = $response->json();
            foreach ($data as $userData) {
                FetchUser::updateOrCreate(
                    ['email' => $userData['email']],
                    [
                        'first_name' => $userData['name'],
                        'last_name' => $userData['name'],
                        'avatar' => $userData['name'],
                        'phone' => $userData['phone'],
                        'website' =>$userData['website'],
                        'company_name'=>$userData['company']['name'],
                        'bs'=>$userData['company']['bs'],
                        'address'=>$userData['address']['street'],
                        'suite'=>$userData['address']['suite'],
                        'city'=>$userData['address']['city'],
                        'zipcode'=>$userData['address']['zipcode'],
                        'lat'=>$userData['address']['geo']['lat'],
                        'lng'=>$userData['address']['geo']['lng'],
                    ]
                );
            }

            return response()->json(['message' => 'Users fetched and saved successfully.']);
        } else {
            return response()->json(['message' => 'Failed to fetch users.'], 500);
        }
    }
}
