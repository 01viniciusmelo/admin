<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

trait ApiResponser {
    
    /**
     *  Build a success response
     *  @param string|array $data
     *  @param int $code,
     *  @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK) {
        
        return response()->json([
            
            'data' => $data,
            $code
            
        ]);
        
    }
    /**
     *  Build an error response
     *  @param string $message
     *  @param int $code,
     *  @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $code) {
        
        return response()->json([
            
            'error' => $message,
            'code' => $code
            
        ], $code);
        
    }
    public function showAll(Collection $collection, $code = 200) {
        
        return $this->successResponse([
            
            'data' => $collection
        
        ], $code);
        
    }
    public function showOne(Model $instance, $code = 200) {
        
        return $this->successResponse([
            
            'data' => $instance
        
        ], $code);
        
    }
}