<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceStoreRequest;
use App\Http\Requests\Service\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ServiceController extends Controller
{
    public function index()
    {

        return view('dashboard.services.index',
            [
                'services' => Service::with('media')->paginate(5)
            ]
        );
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(ServiceStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            try {
                $service = Service::create($request->validated());
                $service->addMediaFromRequest('image')
                    ->toMediaCollection('service_image');
            } catch (FileIsTooBig $e) {
                return back()->withInput()->withErrors(['image' => 'Image Size is to big']);
            } catch (FileDoesNotExist|\Exception $e) {
                return back()->withInput()->withErrors(['store-error' => 'Error Happened try again later']);
            }
        });


        return redirect()->route('dashboard.services.index');
    }

//    public function show(Service $service)
//    {
//    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit',
            [
                'service' => $service
            ]
        );
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        DB::transaction(function () use ($request, $service) {
            try {
                $service->update($request->validated());

                $service->addMediaFromRequest('image')
                    ->toMediaCollection('service_image');
            } catch (FileIsTooBig $e) {
                return back()->withInput()->withErrors(['image' => 'Image Size is to big']);
            } catch (FileDoesNotExist|\Exception $e) {
                return back()->withInput()->withErrors(['update-error' => 'Error Happened try again later']);
            }
        }
        );

        return redirect()->route('dashboard.services.index');

    }

    public function destroy(Service $service)
    {
        try {
            $service->delete();
        } catch (\Exception $exception) {
            return back();
        }

        return redirect()->route('dashboard.services.index');
    }
}
