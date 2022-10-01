<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceValid;
use App\Models\Service;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('back.services.all_services', compact('services'));
    }

    public function addService()
    {
        return view('back.services.add_service');
    }

    public function storeService(ServiceValid $request, FlasherInterface $flasher)
    {
        $service = Service::create([
            'service_icon' => $request->service_icon,
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc
        ]);

        if ($service)
        {
            $flasher->addSuccess('Service Added Successfully');
            return redirect()->route('admin.services');
        }
        else
        {
            $flasher->addError('Service not added, try again');
            return redirect()->back();
        }

    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);

        return view('back.services.edit_service', compact('service'));
    }

    public function updateService(ServiceValid $request, FlasherInterface $flasher)
    {
        $serviceId = $request->service_id;

        $serviceToUpdate = Service::findOrFail($serviceId);

        $serviceToUpdate->update([
            'service_name' => $request->service_name,
            'service_icon' => $request->service_icon,
            'service_desc' => $request->service_desc
        ]);

        $flasher->addInfo('Service Updated Successfully');
        return redirect()->route('admin.services');
    }

    public function deleteService($id, FlasherInterface $flasher)
    {
        $serviceToDelete = Service::findOrFail($id);
        $serviceToDelete->delete();

        $flasher->addError('Service Deleted');
        return redirect()->route('admin.services');
    }

    // start app
    public function appServices()
    {
        $services = Service::latest()->get();
        return view('app.services.all_services', compact('services'));
    }

}
