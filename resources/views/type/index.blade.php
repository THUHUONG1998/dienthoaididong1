@extends('pages.layout.layouts')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('type.create') }}"> Create New Product</a>
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
            <th>No</th>
            <th>Name</th>
            <th width="200px">Icon</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($type as $value)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $value->name }}</td>
            <td>{{ $value->icon }}</td>
            <td>{{$value->status}}</td>
	        <td>
                <form action="{{ route('type.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('type.show',$value->id) }}">Show</a>
                   
                    <a class="btn btn-primary" href="{{ route('type.edit',$value->id) }}">Edit</a>
                    


                    @csrf
                    @method('DELETE')
                 
                    <button type="submit" class="btn btn-danger">Delete</button>
                  
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $type->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection