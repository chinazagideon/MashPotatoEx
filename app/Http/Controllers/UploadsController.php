<?php

namespace App\Http\Controllers;

use App\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class UploadsController extends Controller
{
    public function saveFile($file,  $type, $caption){

        if(!empty($file) && $this->validateFileType($file->getClientOriginalExtension())) {
            $image = $file;
            $filename = '200x200_'.Str::slug($caption).'.' . $image->getClientOriginalExtension();
//            $image_resize = Image::make($image->getRealPath());
//            $image_resize->crop(200, 200);
//            $image_resize->save(storage_path('/app/public/products') . $filename);

            $destinationPath = storage_path('/app/public/miner');
            $image->move($destinationPath, $filename);
            $upload = new Uploads();
            $upload->upload_file_name = $type;
            $upload->file_type = $image->getClientOriginalExtension();
            $upload->filename = $filename;
            $upload->filepath = strtolower('miner/' . $filename);
            $upload->disk = 'local';
            $upload->save();

            return $filename;
        }else{
            return false;
        }
    }

    public function validateFileType($type){
        if(strtolower($type) ==='png' || strtolower($type) === 'jpg' || strtolower($type) === 'jpeg' || strtolower($type) === 'pdf')
            return true;
        return false;
    }
}
