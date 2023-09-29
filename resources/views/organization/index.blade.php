@extends('layouts.erp.app')
@section('page')


<div class="d-flex justify-content-between m-3">
  <h3 class="text-success">Manage Organization</h3>
  <a href="{{route('organization.create')}}" class="btn btn-outline-success"> + </a>
</div>


<table class="table table-success">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
    
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($org as $row)
    <tr>

      <th scope="row">{{$row->id}}</th>
      <th scope="row">{{$row->name}}</th>
      <th scope="row">{{$row->description}}</th>
     
     

      <td>
        <a class="btn btn-success" href="{{route('organization.edit',$row->id)}}"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

        <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('organization.destroy',$row->id)}}" method="post">
          @csrf
          @method('delete')
          
          <button type="submit" class="btn btn-danger" name="delete"><i class='fa-solid fa-trash'></i></button>
        </form>
      
      </td>
      
    </tr>


    @empty

    @endforelse

  </tbody>
</table>
<hr>


@endsection