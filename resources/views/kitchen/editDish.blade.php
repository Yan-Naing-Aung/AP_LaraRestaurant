@extends('layouts.master')
    
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>

      
      <div class="content">
        <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Create a delicious dish</h1>
                <a href="/dish" class="btn btn-default" style="float:right">Back</a>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="/dish/{{$dish->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Dish Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$dish->name)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" >
                            <option value="">SELECT CATEGORIES</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}" {{$cat->id == $dish->category_id ? 'selected':''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label><br>
                        <img src="{{url('/images/'.$dish->image)}}" alt="" width="250"><br><br>
                        <input type="file" name="dish_image">
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
            </div>
            </div>
            </div>
        
    </div>
@endsection
