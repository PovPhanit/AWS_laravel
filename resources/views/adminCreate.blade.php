@extends('adminLayout.master')

@section('admin')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
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
                <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <div>
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" style="display: none" name="image">
                        </div>
                        <label for="image" class="btn btn-success">Upload Image</label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select  class="form-control" name="category_id">
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea  id="" cols="30" rows="10" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit"  class="btn btn-primary">Create</button>
                    </div>
            </form>         
                 </div>
            </div> 
        </div> 
@endsection