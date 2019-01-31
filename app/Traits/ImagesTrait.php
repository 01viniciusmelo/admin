<?php

namespace App\Traits;

use File;

trait ImagesTrait
{
    
    public function uploadImage($avatar, $imagePath = null) {
        
        if ($avatar) {
    
            $encodedAvatar = explode(',', $avatar);
            $decodedAvatar = base64_decode($encodedAvatar[1]);
            
            $extension = $this->getExtension($encodedAvatar);
    
            $this->deleteAvatar($imagePath);
    
            $fileName =  str_random() . '.' . $extension;
            $path = public_path() . '/' . $fileName;
    
            file_put_contents($path, $decodedAvatar);
    
            return $fileName;
            
        }
        
        return null;
        
    }
    
    private function getExtension ($avatar) {

        $extension = '';
        if (str_contains($avatar[0], 'jpeg')) {
            $extension = 'jpg';
        }
        if (str_contains($avatar[0], 'png')) {
            $extension = 'png';
        }
        
        return $extension;
    }
    
    public function deleteAvatar($imagePath) {
        
        if (! empty($imagePath)) {
            
            return File::delete(public_path() . '/' . $imagePath);
            
        }
        
    }
    
}