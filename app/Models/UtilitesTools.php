<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilitesTools extends Model
{
    use HasFactory;

    public static function ProccedToSaveImage($file, $DestinationPath)
    {
        try {
            //TODO:Write Function Definition Here...
            //Write Code
            $temp = rand(1000, 10000) . '_img' . $file->getClientOriginalName();
            $file->move($DestinationPath, $temp);
            $filename = $DestinationPath . $temp;


            return ['success' => true, 'data' => $filename, 'message' => '']; //Response positive
        } catch (\Exception $ex) {
            return ['success' => false, 'data' => [], 'message' => $ex->getMessage()]; //Response Cause Error
        }
    }


    /**
     * @return array
     * IsBase64Image:its Defies if Image Contain Real base 64 or with Image prefix Its Contain True Or False Value
     */
    public static function ProccedToSaveBase64Image($DestinationPath, $Image, $IsRealBase64Image)
    {
        try {
            //TODO:Write Function Definition Here...
            //Write Code
            if ($IsRealBase64Image == true) {
                $data = base64_decode($Image);
            } else {
                list($type, $Image) = explode(';', $Image);
                list(, $Image) = explode(',', $Image);
                $data = base64_decode($Image);
            }

            $ImageName = uniqid() . 'IMG' . ".png";

            if (!file_exists($DestinationPath)) {
                mkdir($DestinationPath, 0777, true);
            }
            $FileName = $DestinationPath . $ImageName;
            file_put_contents($FileName, $data);


            //                    $Responce->success=true;
            //                    $Responce->data=['FileName'=>$FileName];
            //                    $Responce->message='';

            return ['success' => true, 'data' => $FileName, 'message' => '']; //Response positive
        } catch (\Exception $ex) {
            return ['success' => false, 'data' => '', 'message' => $ex->getMessage() . ' Page ' . $ex->getFile()];


            //Response Cause Error
        }
    }

    /**
     * @return array
     */
  
}
