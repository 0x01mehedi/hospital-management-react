<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Add this line to import the User model

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("pages.user.index");
    }

    public function login()
    {
    //    return view("pages.user.login");
       return view("pages.user.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("pages.user.create");
       
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //echo $request->name;
    //     $r=new User();
    //     $r->name=$request->name;
    //     $r->save();
  
    //     return redirect()->route("users.index")->with('success','Success.');
    // }

    public function store(Request $request)
{
    $user = new User(); // Correct instantiation of the User model
    $user->name = $request->name;
    $user->save();

    return redirect()->route("user.index")->with('success', 'Success.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "Show";
        // return view("pages.users.show",["user"=>$user]);
    }

    /**
 * Display the specified resource.
 */
// public function show(string $id)
// {
//     $user = User::find($id); // Fetch the user data from the User model
//     if (!$user) {
//         // Handle case where user with the given ID is not found
//         return response()->json(['error' => 'User not found'], 404);
//     }

//     return view("pages.user.show", ["user" => $user]);
// }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("pages.user.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $request->name." Updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo "Destory";
    }

    // public function getUsers($id)
    // {
    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }

    //     return response()->json($user);
    // }
}
