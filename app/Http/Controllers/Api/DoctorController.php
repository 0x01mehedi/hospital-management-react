<?php

namespace App\Http\Controllers\Api;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["doctors" => Doctor::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $doctor=new Doctor;
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->department_id=$request->department;
        $doctor->phone=$request->phone;
        $doctor->address=$request->address;        
        $doctor->designation=$request->designation;
        $doctor->schedule=$request->schedule;
        $doctor->available_appointment=$request->appointment;
        $doctor->photo=$request->photo;
        
        if(isset($request->photo)){
           $doctor->photo=$request->photo;
        }

        $doctor->save();
        if(isset($request->photo)){
            $imageName = $doctor->id.'.'.$request->photo->extension();
            $doctor->photo=$imageName;
            $doctor->update();
            $request->photo->move(public_path('img'),$imageName);
        }



        return json_encode(['success'=>'Saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return json_encode(Doctor::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return json_encode(["success"=>$request->star,"ID"=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Doctor::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
