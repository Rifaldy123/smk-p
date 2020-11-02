@extends('layouts')
@section('content')
<div class="container mt-2">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('carousels.index') }}"> Back</a>
        </div>
    </div>
</div>
   
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
<form action="{{ route('carousels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Post Title" required="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Post Description" required=""></textarea>
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Post Image:</strong>
                 <input type="file" name="url" class="form-control" placeholder="Post Title">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <label class="">Gambar Dibawah Merupakan Carousel Type-1</label>
                <input type="radio" name="type" class="form-control" value="https://i.imgur.com/xRo7k8S.png"><p class="text-center">Type-1</p>
                <img src="{{asset('/images/type2.png')}}" style="width: 100%">
                <div class="py-4"></div>
              </div>
              <div class="form-groupm">
                <label class="">Gambar Dibawah Merupakan Carousel Type-2</label>
                <input type="radio" name="type" class="form-control" value="https://i.imgur.com/SVeAm3r.png*/"><p class="text-center">Type-2</p>
                <img src="{{asset('/images/type2.png')}}" style="width: 100%">
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
   
</form>
@endsection