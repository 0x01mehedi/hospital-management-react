<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;


class DoctorController extends Controller{

   public function __construct(){
      $this->middleware('auth');
  }

   public function index(){

      $doctors = Doctor::paginate(5);
      return view("pages.doctor.index", ["doctors" => $doctors]);

   //    $doctors = DB::table('doctors')->get();
   //    $doctors = Doctor::paginate(5);
   //    //print_r(Role::all());
   //   return view("pages.doctor.index",["doctors"=>Doctor::all()]);
   }

   public function create(){
      $doctors = DB::table('doctors')->get();
      $departments=Department::all();
      return view("pages.doctor.create", ["doctor"=>$doctors,"departments"=>$departments]); 
   }

   public function store(Request $request){
      $photoName = time().'.'.$request->photo->extension();
      $request->photo->move(public_path('img'),$photoName);

      //echo $request->name;
      $r=new Doctor();
      $r->name=$request->name;
      $r->email=$request->email;      
      $r->department_id=$request->department;
      $r->phone=$request->phone;
      $r->address=$request->address;
      $r->designation=$request->designation;
      $r->photo=$request->photo;
      $r->schedule=$request->schedule;
      $r->available_appointment=$request->appointment;

      $r->photo=$photoName;
      $r->save();

      return redirect()->route("doctors.index")->with('success','Success.');

   }


   public function edit(Doctor $doctor){
      //echo "Edit:".$id;
      //$role=Role::find($id);
      return view("pages.doctor.edit", ["doctor"=>$doctor]); 
   }

  public function update(Request $request,Doctor $doctor){
     //echo "Update:".$id;
     //$role= Role::find($id);
     $doctor->name=$request->name;
     $doctor->email=$request->email;
     $doctor->phone=$request->phone;
     $doctor->update();
     return redirect()->route("doctors.index")->with('success','Success.');
  }  


   public function show($id){
      echo "Show:".$id;
      // return view("pages.role.show");
   }

   public function delete($id){
      $doctor=Doctor::find($id);
      //echo $role->id;
      return view("pages.doctor.delete",["doctor"=>$doctor]);
   }

   public function destroy(Doctor $doctor){
      $doctor->delete();
      return redirect()->route("doctors.index")->with('success','Success.');
   }

}