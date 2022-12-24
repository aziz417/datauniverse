<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HubspotApiController extends Controller
{
    public function create(Request $r)
    {
        $arr = [
            'properties' => [
                [
                    'property' => 'firstname',
                    'value' => $r['firstname']
                ],
                [
                    'property' => 'lastname',
                    'value' => $r['lastname']
                ],
                [
                    'property' => 'phone',
                    'value' => $r['phone']
                ],
                [
                    'property' => 'email',
                    'value' => $r['email']
                ],
            ]
        ];
        $post_json = json_encode($arr);
        $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . env('HUBSPOT_API_KEY');
        $client = new Client();
        $res = $client->request('POST', $endpoint, [
            'body' => $post_json
        ]);
        return "Contact Created!";
    }
}
