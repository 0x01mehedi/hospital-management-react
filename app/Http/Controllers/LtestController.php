<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Gender;
use App\Models\Blood;
use App\Models\Type;
use App\Models\Doctor;
use App\Models\Ltest;
use Illuminate\Support\Facades\DB;



class LtestController extends Controller{

   public function __construct(){
       $this->middleware('auth');
   }

   public function index(){

      // $patients = DB::table('patients')->get();
      // $genders=Gender::all();
      // $bloods=bloods::all();
   


      //    $patients=DB::table("patients as p")
      //   //->join("uoms as u","p.uom_id","=","u.id")
      //   ->join("bloods as g","g.id","=","p.bloods_id")
      //   ->select("p.id","p.name","g.name as blood","p.email","p.contact_number","p.address","p.photo")
      //   ->paginate(2);
      

      
      //print_r(Role::all());
   //   return view("pages.patient.index",["patients"=>Patient::all()]);
   return view("pages.ltest.index",["ltests"=>$ltests]);
   }

   public function create(){
      $patients = DB::table('patients')->get();
      $genders=Gender::all();
      $bloods=Blood::all();
      $types=Type::all();
      $doctors=Doctor::all();
      return view("pages.patient.create", ["patient"=>$patients,"genders"=>$genders,"bloods"=>$bloods,"types"=>$types,"doctors"=>$doctors]); 
   }

   public function store(Request $request){
      //echo $request->name;

       $photoName = time().'.'.$request->photo->extension();
		 $request->photo->move(public_path('img'),$photoName);


      $r=new Patient();
      $r->name=$request->name;
      $r->dob=$request->dob;
      $r->bloods_id=$request->blood;
      $r->gender_id=$request->gender;
      $r->address=$request->address;
      $r->contact_number=$request->contact;
      $r->email=$request->email;
      $r->employee=$request->employee;
      $r->type_id=$request->type;
      $r->doctor_id=$request->doctor;
      
		
      $r->photo=$photoName;
      $r->save();

      return redirect()->route("patients.index")->with('success','Success.');

   }


   public function edit(Patient $patient){
      //echo "Edit:".$id;
      //$role=Role::find($id);
      $genders=Gender::all();
      $bloods=Blood::all();
      $types=Type::all();
      $doctors=Doctor::all();
      return view("pages.patient.edit", ["patient"=>$patient,"genders"=>$genders,"bloods"=>$bloods,"types"=>$types,"doctors"=>$doctors]); 
   }

  public function update(Request $request,Patient $patient){
     //echo "Update:".$id;
     //$role= Role::find($id);
     $patient->name=$request->name;
     $patient->email=$request->email;
     $patient->contact_number=$request->contact_number;

      if(isset($request->photo)){
         $patient->photo=$request->photo;
         }

      if(isset($request->photo)){
         $photoName = $patient->id.'.'.$request->photo->extension();
         $patient->photo=$photoName;
         $request->photo->move(public_path('img'),$photoName);
      }


     $patient->update();
     return redirect()->route("patients.index")->with('success','Success.');
  }  


    
  public function show(Patient $patient){
   $patientDetail = DB::table("patients as p")
       ->join("bloods as b", "b.id", "=", "p.bloods_id")
       ->join("genders as g", "g.id", "=", "p.gender_id")
       ->join("types as t", "t.id", "=", "p.type_id")
       ->join("doctors as d", "d.id", "=", "p.doctor_id")
       ->select("p.id", "p.name", "p.dob", "b.name as blood", "g.name as gender", "p.email", "p.employee", "p.contact_number as contact", "p.address", "t.name as type", "d.name as doctor", "p.photo")
       ->where("p.id", $patient->id)
       ->first();

   return view('pages.patient.show', ["patient" => $patientDetail]);
}




   public function delete($id){
      $patient=Patient::find($id);
      //echo $role->id;
      return view("pages.patient.delete",["patient"=>$patient]);
   }

   public function destroy(Patient $patient){
      $patient->delete();
      return redirect()->route("patients.index")->with('success','Success.');
   }

}