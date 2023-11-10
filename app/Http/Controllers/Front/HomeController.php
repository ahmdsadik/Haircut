<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Stylist;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke()
    {

        $stylists = Cache::rememberForever('stylists', function () {
            return Stylist::with(['specialization', 'media'])->get();
        });

        $services = Cache::rememberForever('services', function () {
            return Service::all(['name', 'price', 'description']);
        });


        return view('front.index', compact('stylists', 'services'));
    }
}
