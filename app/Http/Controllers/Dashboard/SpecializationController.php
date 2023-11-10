<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\SpecializationStoreRequest;
use App\Http\Requests\Specialization\SpecializationUpdateRequest;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index()
    {
        return view('dashboard.specializations.index',
            [
                'specializations' => Specialization::paginate(5),
            ]
        );
    }

    public function create()
    {
        return view('dashboard.specializations.create');
    }

    public function store(SpecializationStoreRequest $request)
    {
        Specialization::create($request->validated());

        return to_route('dashboard.specializations.index');
    }

    public function show(Specialization $specialization)
    {
    }

    public function edit(Specialization $specialization)
    {
        return view('dashboard.specializations.edit', compact('specialization'));
    }

    public function update(SpecializationUpdateRequest $request, Specialization $specialization)
    {
        $specialization->update($request->validated());

        return to_route('dashboard.specializations.index');
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return to_route('dashboard.specializations.index');
    }
}
