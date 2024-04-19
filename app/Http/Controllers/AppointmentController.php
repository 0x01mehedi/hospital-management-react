<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Http\Controllers\Appointment;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\AppointmentStatuse;

use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;


class AppointmentController extends Controller{

   public function __construct(){
      $this->middleware('auth');
  }

 public function index(){
   $appointments = DB::table("appointments as a")
       ->join("patients as p", "p.id", "=", "a.patient_id")
       ->join("doctors as d", "d.id", "=", "a.doctor_id")
       ->join("appointment_statuses as as", "as.id", "=", "a.appointment_statuses_id")
       ->select("a.id", "p.name as patient", "d.name as doctor", "a.appointment_date", "as.name as statuses")
       ->paginate(2);

   return view("pages.appointment.index", ["appointments" => $appointments]);
}

   public function create(){
    $appointments = DB::table('appointments')->get();
    $patients=Patient::all();
    $statuses=AppointmentStatuse::all();
    $doctors=Doctor::all();
      return view("pages.appointment.create",["appointments" => $appointments,"patients" => $patients,"statuses" => $statuses,"doctors" => $doctors]); 
   }

   public function store(Request $request){
      //echo $request->name;
    
      $r=new Appointment();
      $r->patient_id=$request->patient;
      $r->doctor_id=$request->doctor;
      $r->appointment_date=$request->date;
      $r->appointment_time = $request->date . ' ' . $request->time;
      $r->appointment_statuses_id=$request->status;
      $r->save();

      return redirect()->route("appointments.index")->with('success','Success.');

   }


   public function edit(Appointment $appointment){
      //echo "Edit:".$id;
      //$role=Role::find($id);
      $patients=Patient::all();
      $doctors=Doctor::all();
      $statuses=AppointmentStatuse::all();
      return view("pages.appointment.edit", ["appointment"=>$appointment,"patients"=>$patients,"doctors"=>$doctors,"statuses"=>$statuses]); 
   }
 

   public function update(Request $request, Appointment $appointment){
      $appointment->appointment_date = $request->date;
      $appointment->appointment_time = $request->time;
      $appointment->appointment_statuses_id = $request->status;
      $appointment->save();
      return redirect()->route("appointments.index")->with('success','Success.');
}

   public function show(Appointment $appointment){
   $appointmentDetail = DB::table("appointments as a")
        ->join("patients as p", "p.id", "=", "a.patient_id")
        ->join("doctors as d", "d.id", "=", "a.doctor_id")
        ->join("appointment_statuses as as", "as.id", "=", "a.appointment_statuses_id")
        ->select("a.id", "p.name as patient", "d.name as doctor", "a.appointment_date", "a.appointment_time", "as.name as statuses")
        ->where("a.id", $appointment->id)
        ->first();

    return view('pages.appointment.show', ["appointment" => $appointmentDetail]);
 } 
 
    public function delete($id){
       $appointment=Appointment::find($id);
       //echo $role->id;
       return view("pages.appointment.delete",["appointment"=>$appointment]);
    }
 
    public function destroy(Appointment $appointment){
       $appointment->delete();
       return redirect()->route("appointments.index")->with('success','Success.');
    }

}