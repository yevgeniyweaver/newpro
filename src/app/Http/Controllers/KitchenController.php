<?php

namespace App\Http\Controllers;

use App\DTO\KitchenDto;
use App\Models\Kitchen;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\KitchenInterface;
use Illuminate\Support\Facades\Storage;

class KitchenController extends Controller
{

    public function __construct(private KitchenInterface $kitchenRepo) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['style', 'price_min', 'price_max', 'sort']);
        $kitchenDtoRequest = KitchenDto::fromrequest($request);
        return response()->json($this->kitchenRepo->filter($kitchenDtoRequest));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function filter(Request $request)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function export(Request $request)
    {
        $filters = $request->only(['style', 'price_min', 'price_max', 'sort']);
        $kitchenDtoRequest = KitchenDto::fromrequest($request);
        $path = $this->kitchenRepo->exportCsv($filters);
        return response()->download(Storage::path($path));
    }



    /**
     * Display the specified resource.
     */
    public function show(Kitchen $kitchen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kitchen $kitchen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kitchen $kitchen)
    {
        //
    }
}
