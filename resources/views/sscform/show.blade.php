@extends('layouts.erp.app')
@section('page')

<table style="width: 93%; margin:auto" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="text-success">Form ID:{{$sscform->id}}</h4>
            </th>
        </tr>
    </thead>
    <tbody>

            <tr>
                <td>Category</td>
                <td>
                    <h5 class="text-success">{{$sscform->category->name}}</h5>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                <h5 class="text-success">{{$sscform->name}}</h5>
                </td>
            </tr>
            <tr>
                <td>Father's Name</td>
                <td>
                <h5 class="text-success">{{$sscform->father_name}}</h5>
                </td>
            </tr>
          
           


    </tbody>
</table>

@endsection