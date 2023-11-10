<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkingHours\StoreWorkingHourRequest;
use App\Http\Requests\WorkingHours\UpdateWorkingHourRequest;
use App\Models\WorkingHour;
use Illuminate\Support\Carbon;

class WorkingHourController extends Controller
{
    public function index()
    {
        return view('dashboard.working-hours.index',
            [
                'workingHours' => WorkingHour::all(),
            ]
        );
    }

    public function create()
    {
        $times = $this->getTimes();
        return view('dashboard.working-hours.create', compact('times'));
    }

    public function store(StoreWorkingHourRequest $request)
    {
        WorkingHour::create($request->validated());

        return to_route('dashboard.working-hours.index');
    }

    public function show(WorkingHour $workingHours)
    {
    }

    public function edit(WorkingHour $workingHour)
    {
        $times = $this->getTimes();
        return view('dashboard.working-hours.edit', compact('workingHour', 'times'));
    }

    public function update(UpdateWorkingHourRequest $request, WorkingHour $workingHour)
    {
        $workingHour->update($request->validated());
        return to_route('dashboard.working-hours.index');
    }

    public function destroy(WorkingHour $workingHour)
    {
        $workingHour->from = null;
        $workingHour->to = null;
        $workingHour->save();
        return to_route('dashboard.working-hours.index');
    }

    protected function getTimes()
    {
        $times = [];
        for ($i = 0; $i < 24; $i++) {
//            $times[] = date('h A', mktime($i));
            $times[] = Carbon::create(0, 0, 0, $i)->format('h A');
        }
        return $times;
    }
}
