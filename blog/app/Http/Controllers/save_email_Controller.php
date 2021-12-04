<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class save_email_Controller extends Controller
{  
  
 

    public function index(){

        $post_v =  Post::all()  ;
        return view('post',['post'=>$post_v]);
    }

    public function update (Request $request ,  $id) 
    {
      // $accounte_to_edit  =Post::find($id);
      $request ->validate(['username'=>'','password'=>'']);
      $post=Post::find($id);
      $post->password= $request->password;
      $post->username = $request->username;
      $post->name = $request->name;
      $post->save() ;

return redirect()->route('post.index')->with("update_done", 'update done successfly');

    
      
    }
    public function store (Request $request)
    {

        //return $request->all();

        $request ->validate(
          ['username'=>'required'
        ,'password'=>'required']);
        $new_post = new Post(); 
        $new_post->name = $request->name;
        $new_post->username = $request->username;
        $new_post->password= $request->password;
        $new_post->save();

      return redirect('/login_account')->with("okay", 'okay you added your valus');
   }



   public function destroy ($id)
    {
      $account_to_delete =Post::find($id);
      $account_to_delete->delete();
      return redirect()->route('post.index')->with("success_delete", 'accunte deleted ');
    }



    public function edit ($id) 
        {
        $accounte_to_edit  =Post::find($id);

        // return $id;
      return view('accounte_to_edit',['edit'=>$accounte_to_edit ] );
      }
      

      public function login_to_admin_panal(Request $request)
      {
    
      $request ->validate(['username'=>'required','password'=>'required']);
     
      $adminU= "amgad.wr.1@gmail.com";
      $adminP="amgad123"; 
    if( $adminU == $request->username and $request->password==$adminP)
     {
      return redirect()->route('post.index');
     }  
     return view ('admin');
     
    }
      
}