@extends('layouts.erp.app')
@section('page')

<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="text-success">Create Category</h4>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           
            <tr>
            <td>    Organization</td>
                <td>
                    <select class="form-select" name="organization_id" required>
                        <option value="-1">Select Organization</option>

                        @forelse ($org as $row)

                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @empty

                        @endforelse
                    </select>
                </td>
            </tr>
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
                    <input class="btn btn-success mt-3" type="submit" value="Add Category">
                </td>
            </tr>
        </form>
    </tbody>
</table>


@endsection