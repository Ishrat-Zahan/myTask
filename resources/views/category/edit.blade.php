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
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')



            <tr>
                <td>Organization</td>
                <td>
                    <select class="form-select" name="organization_id" required>
                        <option value="-1">Select Organization</option>
                        @foreach ($org as $row)
                        <option value="{{ $row->id }}" {{ $category->organization_id == $row->id ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>


            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}" required>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $category->description }}" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-success mt-3" type="submit" value="Update Category">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection