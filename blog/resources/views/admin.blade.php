@extends('hi')


@section('page-title')
  login To adminPanel
@endsection



@section('contant')
<form action="{{Route('post.database')}}" method="post">
    {{csrf_field()}}
            <div>
                    
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">username</label>
            <input type="text "name = "username" class="form-control" id="username" >
            </div>

            <div class="mb-3">
            <label  class="form-label">password</label>
            <input type="password"name = "password" class="form-control" id="password">
            

            </div>
            

    <input type="submit"name="submit" class="btn btn-primary"value="Submit">
</form>
@endsection
