@extends('hi')


@section('page-title')
 Update info 
@endsection

@section('contant')
            <div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(session('update_done'))
                    <div class="alert alert-success mt-5">
                        <h1>{{session('update_done')}} </h1>
                    </div>

                @endif

               

            <form action="{{route('post.update' ,$edit-> id)}}" method="post">
                {{csrf_field()}}
                        <div>

                       <div class="mb-3">
                           <label  class="form-label">name</label>
                           <input type="text"name = "name" class="form-control" id="name" value="{{$edit->name}}" >
                       </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input type="text "name = "username" class="form-control" id="username" value="{{$edit->username}}">
                        </div>

                        <div class="mb-3">
                        <label  class="form-label">password</label>
                        <input type="text"name = "password" class="form-control" id="password" value="{{$edit->password}}" >
                        
                        </div>

                <input type="submit"name="submit" class="btn btn-success"value="update">
            </form>

            </div>
@endsection
