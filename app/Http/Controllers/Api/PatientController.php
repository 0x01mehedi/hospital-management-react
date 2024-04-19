<?php

namespace App\Http\Controllers\Api;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $patients=DB::table("patients as p")
        // //->join("uoms as u","p.uom_id","=","u.id")
        // ->join("bloods as g","g.id","=","p.bloods_id")
        // ->join("genders as g", "g.id", "=", "p.gender_id")
        // ->select("p.id","p.name","g.name as blood","g.name as gender","p.email","p.contact_number","p.address","p.photo")
        // ->paginate(2);
      
        return response()->json(["patients" => Patient::all()]);
        // return view('pages.patient.index', ["patient" => $patients]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $patient=new Patient;
        $patient->name=$request->name;
        $patient->dob=$request->dob;
        $patient->bloods_id=$request->bloods_id;
        $patient->gender_id=$request->gender_id;
        $patient->email=$request->email;
        
        $patient->employee=$request->employee;
        $patient->type_id=$request->type_id;
        $patient->doctor_id=$request->doctor_id;
        $patient->address=$request->address;
        $patient->contact_number=$request->contact_number;
        $patient->photo=$request->photo;
        
        if(isset($request->photo)){
           $patient->photo=$request->photo;
        }

        $patient->save();
        if(isset($request->photo)){
            $imageName = $patient->id.'.'.$request->photo->extension();
            $patient->photo=$imageName;
            $patient->update();
            $request->photo->move(public_path('img'),$imageName);
        }



        return json_encode(['success'=>'Saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $patientDetail = DB::table("patients as p")
        // ->join("bloods as b", "b.id", "=", "p.bloods_id")
        // ->join("genders as g", "g.id", "=", "p.gender_id")
        // ->join("types as t", "t.id", "=", "p.type_id")
        // ->join("doctors as d", "d.id", "=", "p.doctor_id")
        // ->select("p.id", "p.name", "p.dob", "b.name as blood", "g.name as gender", "p.email", "p.employee", "p.contact_number as contact", "p.address", "t.name as type", "d.name as doctor", "p.photo")
        // ->where("p.id", $patient->id)
        // ->first();
 
    // return view('pages.patient.show', ["patient" => $patientDetail]);
        return json_encode(Patient::find($id));
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
        Patient::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
