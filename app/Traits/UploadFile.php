<?php

namespace App\Traits;

trait UploadFile
{
    public function upload($imageFile , $path){
    $imgExt=$imageFile->getClientOriginalExtension();
    $filename=time() . '-' . $imgExt;        
    $path='assets/images';
    $imageFile->move($path,$filename);
    return $filename;
    }
}
