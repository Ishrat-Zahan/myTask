@extends('layouts.erp.app')
@section('page')



<table style="width: 93%; margin:auto" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="text-success">Edit Category</h4>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('organization.update', $organization->id) }}" method="post">
            @csrf
            @method('PUT')

            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $organization->name }}" required>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $organization->description }}" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-success mt-3" type="submit" value="Update Organization">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection