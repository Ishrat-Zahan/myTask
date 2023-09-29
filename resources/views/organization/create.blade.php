@extends('layouts.erp.app')
@section('page')

<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="text-success">Create Organization</h4>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('organization.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           
           
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input class="form-control" type="text" name="description" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-success mt-3" type="submit" value="Add Organization">
                </td>
            </tr>
        </form>
    </tbody>
</table>


@endsection