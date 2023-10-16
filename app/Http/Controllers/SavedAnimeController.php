<?php

namespace App\Http\Controllers;

use App\Services\JikanMoeAnimesService;
use Illuminate\Http\Request;

class SavedAnimeController
{
    public function store(Request $request)
    {
        $anime = JikanMoeAnimesService::byMalId($request->mal_id)['data'] ?? null;

        if (!$anime) {
            return to_route('home')->with('error', 'Anime não encontrado.');
        }

        auth()->user()->savedAnimes()->create([
            'mal_id' => $anime['mal_id'],
            'title' => $anime['title'],
            'image_cover_url' => $anime['images']['webp']['image_url'],
            'episode_count' => $anime['episodes'] ?? 0,
        ]);

        return to_route('home')->with('success', 'Anime salvo com sucesso como (Assistindo).');
    }
}
