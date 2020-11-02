@extends('layouts');
@section('content');
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <div class="py-4"></div>
                <h2>Carousels List: </h2>
                <div class="py-4"></div>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Type</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($carousels as $carousel)
        <tr>
            <td>{{ $carousel->id }}</td>
            <td><img src="{{ Storage::url($carousel->url) }}" height="75" width="75" alt="" /></td>
            <td>{{ $carousel->title }}</td>



            <td><img src="{{asset($carousel->type)}}"></td>








            <td>{{ $carousel->description }}</td>
            <td>
                <form action="{{ route('carousels.destroy',$carousel->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('carousels.edit',$carousel->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>



    <div class="text-center">
        <div class="pull-right mb-2">
            <a class="btn btn-success btn-center" href="{{ route('carousels.create') }}"> Create New Post</a>
        </div>
    </div>
    {!! $carousels->links() !!}
@endsection