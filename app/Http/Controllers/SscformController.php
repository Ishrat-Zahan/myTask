<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sscform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SscformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ssc = Sscform::with(['category',])->get();
        return view('sscform.index', ['ssc' => $ssc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('sscform.create',['cat' => $cat]);
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

     

        $f = Sscform::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Form Submitted successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sscform $sscform)
    {
        $sscform->load('category');
        return view ('sscform.show',['sscform' => $sscform]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sscform $sscform)
    {
        return view ('sscform.edit',['sscform' => $sscform]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sscform $sscform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sscform $sscform)
    {
        $sscform->delete();
		return redirect()->route("sscforms.index")->with('success', 'Deleted Successfully.');
    }
}
