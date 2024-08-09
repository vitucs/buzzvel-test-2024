<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HolidayController extends Controller
{
    public function index()
    {
        return Holiday::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'location' => 'required|string|max:255',
            'participants' => 'nullable|array',
        ]);

        $holiday = Holiday::create($request->all());

        return response()->json($holiday, 201);
    }

    public function show(Holiday $holiday)
    {
        return $holiday;
    }

    public function update(Request $request, Holiday $holiday)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'date' => 'sometimes|required|date_format:Y-m-d',
            'location' => 'sometimes|required|string|max:255',
            'participants' => 'nullable|array',
        ]);

        $holiday->update($request->all());

        return response()->json($holiday);
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        return response()->json(null, 204);
    }

    public function generatePdf($id)
    {
        $holiday = Holiday::findOrFail($id);

        $data = [
            'title' => $holiday->title,
            'description' => $holiday->description,
            'date' => $holiday->date->format('Y-m-d'),
            'location' => $holiday->location,
            'participants' => $holiday->participants ? implode(', ', $holiday->participants) : 'N/A',
        ];

        $pdf = Pdf::loadView('holidays.pdf', $data);

        return $pdf->download('holiday-plan.pdf');
    }
}
