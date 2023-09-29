<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Honsform;
use App\Models\Hscform;
use App\Models\Sscform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $cat = Category::all();
        return view('user.layout', ['cat' => $cat]);
    }

    public function getForm($catid)
    {

        $sscform = Sscform::where("category_id", $catid)->get();
        return response()->json($sscform);
    }

    public function formSubmit(Request $request)
    {

        // $data = [
        //     'category_id' => $request->category_id,
        //     'name' => $request->name,
        //     'father_name' => $request->father_name,
        //     'mother_name' => $request->mother_name,
        //     'ssc_result' => $request->ssc_result,
        //     'hsc_result' => $request->hsc_result,
        //     'date' => $request->date,
        //     'gender' => $request->gender,
        //     'group' => $request->group,
        // ];

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = $file->store('uploads');
        //     $data['image'] = $path;
        // }

        // dd($data);

        if ($request->category_id == 1) {

            $data = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'date' => $request->date,
                'gender' => $request->gender,
                'group' => $request->group,
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('uploads');
                $data['image'] = $path;
            }

            Sscform::create($data);
        } else if ($request->category_id == 2) {

            $data = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'ssc_result' => $request->ssc_result,
                'date' => $request->date,
                'gender' => $request->gender,
                'group' => $request->group,
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('uploads');
                $data['image'] = $path;
            }

            // dd($data);

            Hscform::create($data);


        } else if ($request->category_id == 3) {

            $data = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'ssc_result' => $request->ssc_result,
                'hsc_result' => $request->hsc_result,
                'date' => $request->date,
                'gender' => $request->gender,
                'group' => $request->group,
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('uploads');
                $data['image'] = $path;
            }

            Honsform::create($data);
        }
    }
}
