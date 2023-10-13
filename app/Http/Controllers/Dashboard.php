<?php

namespace App\Http\Controllers;

use App\Services\JikanMoeAnimesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Dashboard extends Controller
{
    public function __invoke()
    {
        $top_ten = JikanMoeAnimesService::getTopTen();

        return inertia('Dashboard', [
            'animes' => $top_ten
        ]);
    }
}
