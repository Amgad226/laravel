@extends('hi')


@section('page-title')
  login
@endsection

@section('contant')
            <div>
                <div ><p class="text-white bg-dark">sing up in our website</p></div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if(session('okay'))
                    <div class="alert alert-success mt-5">
                        <h1>{{session('okay')}} </h1>
                    </div>

                @endif

               

            <form action="{{Route('post.store')}}" method="POST">
                {{csrf_field()}}
                        <div>

                        <div class="mb-3">
                            <label  class="form-label">name</label>
                            <input type="text"name = "name" class="form-control" id="name">
                        </div>
                                
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input type="text "name = "username" class="form-control" id="username" >
                        </div>

                        <div class="mb-3">
                        <label  class="form-label">password</label>
                        <input type="password"name = "password" class="form-control" id="password">
                        
                        {{-- <div class="md-form md-outline input-with-post-icon datepicker" id="firstWeekday">
                            <input placeholder="Select date" type="date" id="firstWeekday-example" class="form-control">
                            <label for="firstWeekday-example">Try me...</label>
                            <i class="fas fa-calendar input-prefix" tabindex=0></i>
                          </div> --}}

                        </div>
                        

                <input type="submit"name="submit" class="btn btn-primary"value="Submit">
            </form>

            </div>
@endsection
