<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{ public function createProduct(Request $request)
    {
        // get info from body payload.

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $brand = $request->input('brand');

        if(!$name || !$description || !$price || !$brand){
            return response()->json(['message' => 'invalid payload, all fields are required.','data' =>null ],400);
        }
        $filePath = 'C:\xampp\htdocs\products_list.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        $payload = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'brand' => $brand,
        ];

        if(!$jsonContent || !is_array($jsonContent)) {
            $content = [
                $payload
            ];
            file_put_contents($filePath,json_encode($content));
        } else {
            $jsonContent[] = $payload;
            file_put_contents($filePath,json_encode($jsonContent));
        }
        return response()->json(['message' =>'product has been added successfully','data' => $payload]);
    }
    public function deleteProductById($productId)
    {
        $filePath = 'C:\xampp\htdocs\products_list.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        if ($productId < 0 || $productId >count($jsonContent)) {
            return response()->json(['message' => 'Invalid Id'], 400);
        }
        unset($jsonContent[$productId-1]);
        file_put_contents($filePath,json_encode(array_values($jsonContent)));
        return response()->json(['message' => 'product has been deleted successfully']);

    }
    public function ListAllProducts()
    {
        $filePath = 'C:\xampp\htdocs\products_list.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        return response()->json(['message' =>'Retrieved  Successfully!','data' => $jsonContent]);

    }
    public function updateProduct(Request $request, $productId){
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $brand = $request->input('brand');

       if(!$name || !$description || !$price || !$brand){
            return response()->json(['message' => 'invalid payload, all fields are required.','data' =>null ],400);
        }
        $filePath = 'C:\xampp\htdocs\products_list.json';
        $fileContent = file_get_contents($filePath);
        $jsonContent = json_decode($fileContent,true);
        if ($productId < 0 || $productId >count($jsonContent)) {
            return response()->json(['message' => 'Invalid Id'], 400);
        }
        $payload = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'brand' => $brand,
        ];
        $jsonContent[$productId-1]=$payload;
        file_put_contents($filePath, json_encode($jsonContent),0);
        return response()->json(['message' => 'product has been updated successfully','data'=>$jsonContent]);
    }

}
