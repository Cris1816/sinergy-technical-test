<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private const products = 
    [
        [
            "id" => 1,
            "name" => "Papas"
        ],
        [
            "id" => 2,
            "name" => "Paleta de fresa"
        ],
        [
            "id" => 2,
            "name" => "Leche Entera"
        ],
        [
            "id" => 4,
            "name" => "Refresco Sabor Limón"
        ],
    ];

    public function index()
    {
        try 
        {
            return response()->json(self::products, Response::HTTP_OK);    
        } 
        catch (\Throwable $th) 
        {
            return response()->json(["error" => "Server error, try again later"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
