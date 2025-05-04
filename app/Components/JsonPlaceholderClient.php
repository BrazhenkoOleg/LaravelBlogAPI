<?php

namespace App\Components;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class JsonPlaceholderClient
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/'
        ]);
    }

    public function getPosts(): object|array
    {
        try {
            $response = $this->client->get('posts');
            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error('Ошибка при получении постов: ' . $e->getMessage());
            return [];
        }
    }

    public function getComments(): object|array
    {
        try {
            $response = $this->client->get('comments');
            return json_decode($response->getBody());
        } catch (\Exception $e) {
            Log::error('Ошибка при получении комментариев: ' . $e->getMessage());
            return [];
        }
    }
}
