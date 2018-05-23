<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendence;

class AttendenceController extends Controller
{
    
    public function attendenceForm()
    {
        return view('attendence');
    }

    public function store(Request $request)
    {       
        $result = new Attendence();
        $result->class = $request->class;
        $result->subject = $request->subject;
        $result->roll = $request->roll;
        $result->date = $request->date;
        $result->attendence = $request->attendence;   
        $result->save();       
        return response()->json(['success'=>'Attendence Information has been Saved!']);       
        
    }

    public function attendenceReport(Request $request)
    {
        $result = new Attendence();
        $result->class = $request->class;       
        $result->roll = $request->roll;
        $result = $result->select('class', 'subject', 'roll', 'date', 'attendence')
        ->where([
            ['class', '=',  $result->class],
            ['roll', '=',  $result->roll ], 
        ])->get();     
        
        
        $response = "<table id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Roll</th>
                    <th>Date</th>
                    <th>Attendence Status</th>               
                </tr>
            </thead>        
            <tbody> "; 
            foreach ($result as $value) {
            $response .= "<tr>
                            <td>".$value->class."</td>                             
                            <td>".$value->subject."</td>                             
                            <td>".$value->roll."</td>                             
                            <td>".$value->date."</td>                             
                            <td>".$value->attendence."</td>                             
                        </tr> ";
             };
               
         $response .= "</tbody>
        </table>";
        // return response()->json($response);   
        return response()->json(['success'=>$response]);
        // return view('attendence_report');
      
    }
}
