<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hscform;
use Illuminate\Http\Request;

class HscformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hsc = Hscform::with(['category',])->get();
        return view('hscform.index',['hsc' => $hsc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('hscform.create',['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'gender' => $request->gender,
            'group' => $request->group,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads');
            $data['image'] = $path;
           
        }

     

        $f = Hscform::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Form Submitted successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hscform $hscform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hscform $hscform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hscform $hscform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hscform $hscform)
    {
        $hscform->delete();
		return redirect()->route("hscforms.index")->with('success', 'Deleted Successfully.');
    }
}
