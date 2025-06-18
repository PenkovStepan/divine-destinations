<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Валидация данных
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'date' => 'required|date',
                'location_id' => 'required|integer',
                'description' => 'nullable|string',
            ]);

            // Создание события
            $event = Event::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'date' => $validated['date'],
                'location_id' => $validated['location_id'],
                'user_id' => 1 // Временное решение, пока нет аутентификации
            ]);

            return response()->json($event, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
