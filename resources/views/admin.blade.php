@extends('adminLayout.master')

@section('admin')

    <div class="main-content">
        <div class="card">
            <div class="card-header row">
                <div class="row"></div>
                <div class="col-md-6">
                    All Posts
                </div>
                <div class="col-md-6 d-flex justify-content-end gap-2">
                    <a href="{{route('admin.create')}}" class="btn btn-success">Create</a>
                    <a href="" class="btn btn-warning">Trashed</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col" style="width:5%">#</th>
                        <th scope="col" style="width:10%">Image</th>
                        <th scope="col" style="width:20% ">Title</th>
                        <th scope="col" style="width:30%">Desciption</th>
                        <th scope="col" style="width:5%">category</th>
                        <th scope="col" style="width:10%">Publish Date</th>
                        <th scope="col" style="width:20%">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      @foreach ($posts as $post)
                      <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>
                          {{-- <img width="80" src="{{asset('storage/'.$post->image)}}" alt=""> --}}
                             <img width="80" src="{{ Storage::disk('s3')->url($post->image) }}" alt="">
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                          <div class="d-flex gap-3">
                            <a href="{{route('admin.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                          <form action="{{route('admin.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                          </form>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    {{-- </div> --}}

@endsection