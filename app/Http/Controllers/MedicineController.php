<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use Illuminate\Support\Facades\DB;



class MedicineController extends Controller{

   public function __construct(){
       $this->middleware('auth');
   }

   public function index(){
      $medicines = Medicine::all();
            //$medicines = Medicine::paginate(10);

    //   $medicines = DB::table('medicines')->get();
    $medicines=DB::table("medicines as m")
    //->join("uoms as u","p.uom_id","=","u.id")
    ->join("medicine_categories as c", "c.id", "=", "m.category_id")
    ->select("m.id", "m.name", "c.name as category", "m.purchase_price", "m.sale_price", "m.store_box", "m.quantity", "m.generic_name", "m.company", "m.effects", "m.expire_date")
    ->paginate(10);
  
      
      //print_r(Role::all());
   //   return view("pages.patient.index",["patients"=>Patient::all()]);
   return view("pages.medicine.index",["medicines"=>$medicines]);
   }

  public function create(){
    $medicines = DB::table('medicines')->get();
    $category = MedicineCategory::all();
      return view("pages.medicine.create", ["medicines" => $medicines, "category" => $category]); 
   }

   public function store(Request $request){
      //echo $request->name;

      $r=new Medicine();
      $r->name=$request->name;
      $r->category_id=$request->category;
      $r->purchase_price=$request->purchase;
      $r->sale_price=$request->sale;
      $r->store_box=$request->store;
      $r->quantity=$request->quantity;
      $r->generic_name=$request->generic;
      $r->company=$request->company;
      $r->effects=$request->effects;
      $r->expire_date=$request->expire;
      
      $r->save();

      return redirect()->route("medicines.index")->with('success','Success.');

   }


   public function edit(Medicine $medicine){
      //echo "Edit:".$id;
      //$role=Role::find($id);
      $category=MedicineCategory::all();
      return view("pages.medicine.edit", ["medicine"=>$medicine,"category"=>$category]); 
   }

  public function update(Request $request,Medicine $medicine){
     //echo "Update:".$id;
     //$role= Role::find($id);
     $medicine->name=$request->name;
     $medicine->category_id=$request->category;
     $medicine->purchase_price=$request->purchase;
     $medicine->sale_price=$request->sale;
     $medicine->store_box=$request->store;
     $medicine->quantity=$request->quantity;
     $medicine->generic_name=$request->generic;
     $medicine->company=$request->company;
     $medicine->effects=$request->effects;
     $medicine->expire_date=$request->expire;



     $medicine->update();
     return redirect()->route("medicines.index")->with('success','Success.');
  }  


    
  public function show(Medicine $medicine){
    // $medicine = Medicine::find($id);
    // echo "Show:".$id;
    $medicineDetail = DB::table("medicines as m")
       ->join("medicine_categories as c", "c.id", "=", "m.category_id")
       ->select("m.id", "m.name", "c.name as category", "m.purchase_price", "m.sale_price", "m.store_box", "m.quantity", "m.generic_name", "m.company", "m.effects", "m.expire_date")
       ->where("m.id", $medicine->id)
       ->first();


   return view('pages.medicine.show',["medicine" => $medicineDetail]);
}




   public function delete($id){
      $medicine=Medicine::find($id);
      //echo $role->id;
      return view("pages.medicine.delete",["medicine"=>$medicine]);
   }

   public function destroy(Medicine $medicine){
      $medicine->delete();
      return redirect()->route("medicines.index")->with('success','Success.');
   }

}