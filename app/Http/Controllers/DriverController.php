<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Driver::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = new Driver;
        $driver->name = $request->input('name');
        $driver->lastname = $request->input('lastname');
        $driver->id_card = $request->input('id_card');
        $driver->phone = $request->input('phone');
        $driver->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::where('id', $id)->with(['vehicles'])->first();
        return $driver;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::where('id', $id)->with(['vehicles'])->first();
        $vehicles = Vehicle::all();
        return Inertia::render('Drivers/edit', [
            'driver' => $driver,
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverRequest  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::where('id', $id)->first();
        $driver->delete();
    }

    public function showDrivers()
    {
        request()->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:name,lastname']
        ]);

        $query = Driver::query();

        if (request('search')) {
            $query->where('name', 'LIKE', '%'.request('search').'%');
        }

        if (request()->has(['field', 'direction'])) {
            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Drivers/index', [
            'drivers' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);
    }

    public function showDriver($id)
    {
        $driver = Driver::where('id', $id)->with(['vehicles'])->first();
        return Inertia::render('Drivers/show', [
            'driver' => $driver
        ]);
    }

    public function createDriver()
    {
        $vehicles = Vehicle::all();
        return Inertia::render('Drivers/create', [
            'vehicles' => $vehicles
        ]);
    }

    public function driverStore(Request $request)
    {
        $driver = Driver::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'id_card' => $request->id_card,
            'phone' => $request->phone,
        ]);

        $vehicle = Vehicle::where('driver_id', $request->vehicle)->first();
        $vehicle->driver_id = $driver->id;
        $vehicle->save();

        return redirect()->route('drivers');
    }
}
