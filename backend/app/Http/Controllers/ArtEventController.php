<?php

namespace App\Http\Controllers;

use App\Models\ArtEvent;
use Illuminate\Http\Request;

class ArtEventController extends Controller
{
        /**
     * Get all art events from the database.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $events = ArtEvent::all();

        return response()->json($events);
    }

    public function sort(Request $request)
    {
    $sortBy = $request->query('attribute', 'id'); 
    
    if (!in_array($sortBy, ['id', 'name', 'date'])) {
        return response()->json(['error' => 'Invalid sort attribute'], 400);
    }

    $artEvents = ArtEvent::orderBy($sortBy)->get(); 

    return response()->json($artEvents);
    }

    public function search(Request $request)
    {
    $artEventName = $request->query('attribute'); 

    $artEvents = ArtEvent::where('name', 'ILIKE', '%' . $artEventName . '%')->get(); 

    return response()->json($artEvents);
    }

    public function delete(Request $request)
    {
        $artEventID = $request->query('attribute');
    
        try {
            $artEvent = ArtEvent::find($artEventID);
    
            if (!$artEvent) {
                return response()->json([
                    'message' => 'Art event not found.'
                ], 404);
            }
    
            $artEvent->delete();
    
            return response()->json([
                'message' => 'Art event deleted successfully.'
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the art event.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
