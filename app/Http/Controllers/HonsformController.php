<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Honsform;
use App\Models\Hscform;
use Illuminate\Http\Request;

class HonsformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hons = Honsform::with(['category',])->get();
        return view('honsform.index', ['hons' => $hons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('honsform.create', ['cat' => $cat]);
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

     

        $f = Honsform::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Form Submitted successfully!',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Honsform $honsform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Honsform $honsform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Honsform $honsform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Honsform $honsform)
    {
        $honsform->delete();
		return redirect()->route("honsforms.index")->with('success', 'Deleted Successfully.');
    }
}
