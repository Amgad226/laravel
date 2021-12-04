
@extends('hi')
@section('page-title')
Our Email
@endsection

@section('contant')
{{-- @if ($_SERVER['REQUEST_METHOD']=="GET")
<div>{{$_SERVER['REQUEST_METHOD']}}</div> --}}

<div ><p class="text-white bg-dark">welcome in controle panel</p></div>
@if(session('success_delete'))
<div class="alert alert-danger mt-5">
    <h1>{{session('success_delete')}} </h1>
</div>

@endif


            
         
         
<div class="card mt-5" >
 <div class="row">
  <div class="col-lg-12">
    
    @foreach ($post as $item)
  <div class="w-1 p-3">
<div class="border border-secondary" >
    <div class="card-header "> <h2 class="text-left">{{$item->username}} </h2> 
    <span class="float-right"> {{$item->updated_at->diffForHumans("s")}}</span>   </div>

      <div class="card-body">
        <p class="text-left"><span class="font-weight-bold"> id is :</span>   {{$item->id}}   </p>
        <p class="text-left"><span class="font-weight-bold"> name is :</span>   {{$item->name}}   </p>
        <p class="text-left"><span class="font-weight-bold"> password is :</span>   {{$item->password}}   </p>

        {{-- <div class="input-group mb-3">    
          <input name="password" type="password" value="{{$item->password}}" class="input form-control" id="password"    />
          <div class="input-group-append">
            <span class="input-group-text" onclick="password_show_hide();">
              <i class="fas fa-eye" id="show_eye"></i>
              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
            </span>
          </div>
        </div> --}}

        <a id="joj" href= "{{Route('post.destroy',$item->id )}}  " class="btn btn-danger">delete this account  </a>
        <script>  
          let hmaro = document.getElementById("joj")
          hmaro.onclick = function(){  alert("You have permanently deleted the account   ");}
      </script>
        <a href= " {{Route('post.edit',$item->id )}}" class=" btn btn-warning text-dark bg-white">edit this account  </a>
     
      </div>
    </div>
  </div></div>
</div>

    @endforeach
  
</div>

{{-- @endif --}}

{{-- @if (!($_SERVER['REQUEST_METHOD']=="GET"))
<div>You are not allowed to enter </div>
@endif --}}
<script>
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
@endsection