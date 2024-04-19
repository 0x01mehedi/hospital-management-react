<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;


class BedController extends Controller{

   public function __construct(){
      $this->middleware('auth');
  }

   public function index(){

      $beds = Bed::paginate(5);
      return view("pages.bed.index", ["beds" => $beds]);

   //    $doctors = DB::table('doctors')->get();
   //    $doctors = Doctor::paginate(5);
   //    //print_r(Role::all());
   //   return view("pages.doctor.index",["doctors"=>Doctor::all()]);
   }

   public function create(){
      $beds = DB::table('beds')->get();
      return view("pages.bed.create", ["beds"=>$beds]); 
   }

   public function store(Request $request){

      //echo $request->name;
      $r=new Bed();
      $r->name=$request->name;     
      $r->category_id=$request->category;
      $r->room_id=$request->room;
      $r->status_id=$request->status;
      $r->save();

      return redirect()->route("beds.index")->with('success','Success.');

   }


   public function edit(Bed $bed){
      //echo "Edit:".$id;
      //$role=Role::find($id);
      return view("pages.bed.edit", ["bed"=>$bed]); 
   }

  public function update(Request $request,Bed $bed){
     //echo "Update:".$id;
     //$role= Role::find($id);
     $bed->name=$request->name;
     $bed->email=$request->email;
     $bed->phone=$request->phone;
     $bed->update();
     return redirect()->route("beds.index")->with('success','Success.');
  }  


   public function show($id){
      echo "Show:".$id;
      // return view("pages.role.show");
   }

   public function delete($id){
      $bed=Bed::find($id);
      //echo $role->id;
      return view("pages.bed.delete",["bed"=>$bed]);
   }

   public function destroy(Bed $bed){
      $bed->delete();
      return redirect()->route("beds.index")->with('success','Success.');
   }

}