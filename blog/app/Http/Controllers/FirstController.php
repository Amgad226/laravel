<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{

    public function Check_User_Name()
    {
        $name = request('user_name');
        $email= request('email');
        $phone= request('phone');
        $fileContact =file_get_contents("http://localhost:80/json_file.json");
        $jsonContact =json_decode($fileContact);

        foreach($jsonContact as $object)
        {
            $n= ($object->name);
            $p= ($object->phone);
            $e= ($object->email); 

    if  (($object->phone==$phone)||($object->name==$name)||($object->email===$email)) 
        {
            return  response()->json(sprintf(" success operation   your values is [".  ($n." ". $p. " , ". $e )."]"   ))  ;     
        }

    if ($name=="all")
        {
        echo strtoupper($object->name);
        echo"<br>";
        }
        if ($phone=="all")
        {
        echo ($object->phone);
        echo"<br>";
        }
        if ($email=="all")
        {
        echo($object->email);
        echo"<br>";
        }
    }}}
?>  

