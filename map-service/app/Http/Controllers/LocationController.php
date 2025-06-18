<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function search(Request $request)
    {
        try {
            $query = $request->query('q');

            if (!$query) {
                return response()->json(['error' => 'Query parameter "q" is required'], 400);
            }

            $response = Http::withHeaders([
                'User-Agent' => 'DivineDestinations/1.0 (contact@example.com)'
            ])->get('https://nominatim.openstreetmap.org/search', [
                'q' => $query,
                'format' => 'json',
                'limit' => 5
            ]);

            // Проверяем статус ответа
            if ($response->successful()) {
                return $response->json();
            }

            return response()->json([
                'error' => 'OpenStreetMap API error',
                'status' => $response->status(),
                'body' => $response->body()
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $location = Location::create($validated + [
                'user_id' => auth()->id()
            ]);

        return response()->json($location, 201);
    }
}
