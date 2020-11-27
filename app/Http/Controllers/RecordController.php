<?php

namespace App\Http\Controllers;

use App\Record;
use App\AdditionalDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class RecordController extends Controller
{

    public function index() 
    {
        $records = Record::orderBy('id', 'desc')->paginate(20);
        return view('record.index', compact('records'));
    }

    public function view(Record $record) 
    {
        return view('record.view', compact('record'));
    }

    public function create() 
    {
        return view('record.create');
    }

    public function store(Request $request) 
    {
        $records = array_slice($request->all(), 0, 7); // recordsInfo
        $driversInfo = array_slice($request->all(), 7); // additional Drivers
        $chunkedDrivers = array_chunk($driversInfo, 2);

        $validator = Validator::make( $records,[
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'name' => ['required', 'string', 'max:255'],
            'iin' => ['required', 'string', 'max:12', 'min:12'],
            'startDate' => ['required'],
            'finishDate' => ['required'],
            'gosNumber' => ['required'],
        ]);

        $record = Record::create([
            'phone' => $request->phone,
            'name' => $request->name,
            'iin' => $request->iin,
            'start_date' => $request->startDate,
            'finish_date' => $request->finishDate,
            'gos_number' => $request->gosNumber,
        ]);
        if (!empty($chunkedDrivers)) {
            $this->insertDriversInfo($chunkedDrivers, $record->id); 
        }
        
        return Redirect::route('record.index')->with('status', 'Запись успешно создана');
    }

    private function insertDriversInfo($chunkedDrivers, $recordId) {
        foreach($chunkedDrivers as $driver) {
                $reversedDriverArr = array_reverse($driver);
                $name = array_pop($reversedDriverArr); // get first element of array
                $iin = array_pop($driver);  // get last element of array
                AdditionalDriver::create([
                    'name' => $name,
                    'iin' => $iin,
                    'record_id' => $recordId,
                ]);
            
        }
    } 
}
