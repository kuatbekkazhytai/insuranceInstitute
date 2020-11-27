<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getRecords(Request $request) {
        
        // dd($request->all());
        if ($request->iin) { // if iin was passed
            $iin = $request->iin;
            if (Record::where('iin', $iin)->exists()) {
                $records = Record::with('additionalDrivers')->where('iin', $iin)->get()->toJson(JSON_PRETTY_PRINT);
                return response($records, 200);
            } else {
                return response()->json([
                  "message" => "Record not found"
                ], 404);
            }
        } else if($request->driversNum) { // if number of drivers was passed
            $driversNum = $request->driversNum - 1; // - 1 to except record itself, so that only additional drivers left
            
            $records = Record::with('additionalDrivers')->withCount('additionalDrivers')->get(); // count number of drivers for all records
            // dd('saddsa');
            if ($records->where('additional_drivers_count', $driversNum)->count() > 0)  { 
                // dd($records->where('additional_drivers_count', $driversNum)->count() > 0);// check if object is empty
                $filteredRecords = $records->where('additional_drivers_count', $driversNum)->all(); // get records only with given nuber of drivers
                return response(json_encode($filteredRecords), 200);
            } else {
                return response()->json([
                    "message" => "Record not found"
                  ], 404);
            }
        } else { // case wrong data was passed
            return response()->json([
                "message" => "Record not found"
              ], 404);
        }
        
    }
}
