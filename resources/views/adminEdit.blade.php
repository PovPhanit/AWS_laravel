@extends('adminLayout.master')

@section('admin')
    <div class="main-content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        All Posts
                    </div>
                    <div class="col-md-6 d-flex justify-content-end gap-2">
                        <a href="" class="btn btn-success">Create</a>
                        <a href="" class="btn btn-warning">Trashed</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <form action="{{route('admin.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <div>
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" style="display: none" name="image">
                        </div>
                        <img src="{{asset('storage/'.$post->image)}}" width="140" alt="">
                        <label for="image" class="btn btn-success">Upload Image</label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{$post->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select  class="form-control" name="category_id">
                            <option value="">Select</option>
                            @foreach ($categories as $category )
                                <option {{$category->id==$post->category_id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea  id="" cols="30" rows="10" class="form-control" name="description">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit"  class="btn btn-primary">Create</button>
                    </div>
            </form>         
                 </div>
            </div> 
        </div> 
@endsection