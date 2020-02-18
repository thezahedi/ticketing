<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return Helper::json(Unit::all());
    }

    public function show(Unit $unit)
    {
        return Helper::json($unit);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
            ],
        ]);

        $unit = Unit::query()->create($request->only('name'));

        return Helper::json($unit);
    }

    public function update(Request $request, Unit $unit)
    {
        $this->validate($request, [
            'name' => [
                'required',
            ],
        ]);

        $unit->update($request->only('name'));

        return Helper::json($unit->fresh());
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return Helper::json();
    }
}
