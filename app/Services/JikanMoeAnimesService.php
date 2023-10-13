<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JikanMoeAnimesService
{
    const BASE_URL = 'https://api.jikan.moe/v4';

    public static function getTopTen()
    {
        $url_animes = self::BASE_URL . '/anime';
        $query = http_build_query([
            'limit' => 10,
            'order_by' => 'popularity'
        ]);

        return cache()->remember('top_ten_animes', now()->addDays(1), function () use ($url_animes, $query) {
            return Http::get($url_animes . '?' . $query)->json();
        });
    }
}
