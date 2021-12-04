<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeleteById
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
        $filePath = 'C:\xampp\htdocs\products_list.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent, true);


        $error = false;
        if (!$request->hasHeader('token')) {
            $error = true;
        }
        $token = $request->header('token');
        $jsonstr = base64_decode($token);
        $jsonpayload = json_decode($jsonstr, true);


        try {
            if ($jsonpayload["product_id"] < 0 || $jsonpayload["product_id"] > count($jsonContent)) {
                return response()->json([
                    'message' => 'Invalid ID'
                ], 400);
            }
            if (!isset($jsonpayload['email'])) {
                $error = true;
            }
            if ($jsonContent[$jsonpayload["product_id"] - 1]["owner email"] !== $jsonpayload['email']) {
                $error = true;
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
            unset($jsonContent[$jsonpayload["product_id"] - 1]);
            file_put_contents($filePath, json_encode(array_values($jsonContent)));
            return response()->json([
                'message' => 'product has been deleted successfully'
            ]);
        }
        return $next($request);
    }
}
