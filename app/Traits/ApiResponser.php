<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

trait ApiResponser {
    
    
    public function showAll(Collection $collection, $code = Response::HTTP_OK) {
        
        return $this->successResponse([
            
            'data' => $collection
        
        ], $code);
        
    }
    
    public function showOne(Model $model, $code = Response::HTTP_OK) {
        
        return $this->successResponse([
            
            'data' => $model
        
        ], $code);
        
    }
    
    public function successResponse($data, $code = Response::HTTP_OK) {
        
        return response()->json([
            
            'data' => $data,
            $code
        
        ]);
        
    }
    
}