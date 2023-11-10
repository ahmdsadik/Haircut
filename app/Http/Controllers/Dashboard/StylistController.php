<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stylist\StylistStoreRequest;
use App\Http\Requests\Stylist\StylistUpadteRequest;
use App\Models\Specialization;
use App\Models\Stylist;
use Illuminate\Http\Request;

class StylistController extends Controller
{
    public function index()
    {
        return view('dashboard.stylists.index',
            [
                'stylists' => Stylist::with(['media', 'specialization'])->paginate(5),
            ]
        );
    }

    public function create()
    {
        return view('dashboard.stylists.create',
            [
                'specializations' => Specialization::all(),
            ]
        );
    }

    public function store(StylistStoreRequest $request)
    {
        $stylist = Stylist::create($request->validated());
        if ($request->hasFile('image')) {
            $stylist->addMediaFromRequest('image')->toMediaCollection('stylist_image');
        }
        return redirect()->route('dashboard.stylists.index');
    }

//    public function show(Stylist $stylist)
//    {
//    }

    public function edit(Stylist $stylist)
    {
        return view('dashboard.stylists.edit',
            [
                'stylist' => $stylist,
                'specializations' => Specialization::all(),
            ]
        );
    }

    public function update(StylistUpadteRequest $request, Stylist $stylist)
    {
        $stylist->update($request->validated());
        $stylist->addMediaFromRequest('image')->toMediaCollection('stylist_image');
        return redirect()->route('dashboard.stylists.index');
    }

    public function destroy(Stylist $stylist)
    {
        $stylist->delete();
        return redirect()->route('dashboard.stylists.index');
    }
}
