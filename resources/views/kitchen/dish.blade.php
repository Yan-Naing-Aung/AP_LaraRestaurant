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
                <h1 class="card-title">Dishes</h1>
                <a href="/dish/create" class="btn btn-success" style="float:right">Create New Dish</a>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
            @if(session('status'))
              <div class="alert alert-success">
                {{session('status')}}
              </div>
            @endif
                <table id="dish" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dishes as $dish)
                  <tr>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->category->name}}</td>
                    <td>{{$dish->created_at}}</td>
                    <td>
                      <div class="form-row">
                      <a href="/dish/{{$dish->id}}/edit" style="height:40px; margin-right:10px" class="btn btn-success">Edit</a>
                      <form action="/dish/{{$dish->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</button>
                      </form>
                      </div>
                      
                    </td>
                  @endforeach
                  </tr>
                  </tbody>
                </table>
            </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
            </div>
            </div>
            </div>
        
    </div>
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  $(function () {
    $('#dish').DataTable({
      "paging": true,
      "lengthChange": false,
      "pageLength":10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
