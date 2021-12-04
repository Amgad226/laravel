<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $fileContent = file_get_contents('C:\xampp\htdocs\users.json');
        $jsonContent = json_decode($fileContent, true);

        $error = false;
        if (!$request->hasHeader('token')) {
            $error = true;
        }

        $token = $request->header('token');

        $jsonstr = base64_decode($token);
        $jsonpayload = json_decode($jsonstr, true);

        try {
            foreach ($jsonContent as $item) {
                if (!isset($jsonpayload['email']) || !isset($jsonpayload['password'])) {
                    $error = true;
                }
                if ($item['email'] !== $jsonpayload['email'] && $item['password'] !== $jsonpayload['passord']) {
                    $error = true;
                }
            }
        } catch (\Exception $exception) {
            $error = true;
        }
        if ($error) {
            return response()->json([
                'message' => 'Invaled token'
            ], 401);
        }
        if (!$error) {
            return response()->json([
                'message' => 'success login'
            ], 401);
        }


        return $next($request);
    }
}
