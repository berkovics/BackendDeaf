<?php

namespace App\Http\Controllers;

use App\Models\Deaf;
use Illuminate\Http\Request;

class DeafController extends Controller
{
    public function getDeafs()
    {
        return Deaf::all();
    }

    public function addDeaf(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

        $input = $request->all();
        $deaf = new Deaf();
        $deaf->name = $input['name'];
        $deaf->phonenumber = $input['phonenumber'];
        $deaf->address = $input['address'];
        $deaf->email = $input['email'];

        $deaf->save();
        return response()->json([
            'message' => 'New item Added Successfully!!'
        ]);
    }

    /*public function show(Deaf $deaf)
    {
        return response()->json([
            'deaf' => $deaf
        ]);
    }*/

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phonenumber' => 'required',
            'address' => 'required',
            'email' => 'required'
        ]);

        $input = $request->all();
        $deaf = Deaf::find($request->id);
        $deaf->name = $input['name'];
        $deaf->phonenumber = $input['phonenumber'];
        $deaf->address = $input['address'];
        $deaf->email = $input['email'];

        $deaf->save();
        return response()->json([
            'message' => 'New item Updated Successfully!!'
        ]);
    }

    public function destroy(Request $request)
    {
        $request = Deaf::find($request->id);
        $request->delete();
        return response()->json([
            'message' => 'This item Deleted Successfully!!'
        ]);
    }
}
