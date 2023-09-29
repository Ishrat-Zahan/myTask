@extends('layouts.erp.app')
@section('page')


<div class="d-flex justify-content-between m-3">
  <h3 class="text-success">Manage HSC Form</h3>
  <a href="{{route('hscforms.create')}}" class="btn btn-outline-success"> + </a>
</div>


<table class="table table-success">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Mother Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Image</th>
      <th scope="col">Group</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($hsc as $row)
    <tr>

      <th scope="row">{{$row->id}}</th>
      <th scope="row">{{$row->category->name}}</th>
      <th scope="row">{{$row->name}}</th>
      <th scope="row">{{$row->father_name}}</th>
      <th scope="row">{{$row->mother_name}}</th>
      <th scope="row">{{$row->gender}}</th>
      <th scope="row">{{$row->group}}</th>


      <td style="width: 100px; height: 100px; text-align: center;">
        <img style="width: 100%; height: 100%; object-fit: contain;" src="{{asset('storage/')}}/{{$row->image}}" alt="">
      </td>
     

      <td>
        <a class="btn btn-success" href="{{route('hscforms.edit',$row->id)}}"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>

        <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('hscforms.destroy',$row->id)}}" method="post">
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