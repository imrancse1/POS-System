<?php

namespace App\Custom;

class Helper
{
    public static function imageUploadRaw($insertId = null, $imageData = null, $folderPath = null, $height = null, $width = null)
    {
        $image = isset($imageData) ? $imageData : null;
        if (empty($image)) {
            $fileName = NULL;
        } else {
            if ($image->isValid()) {
                $destinationPath = public_path() .'/'. $folderPath;
                $extension = $image->getClientOriginalExtension();
                $uniqPath = substr($imageData->getPathName(),16,4);
                $fileName = $insertId . '-' . date("Ymdhis") . $uniqPath . '.' . $extension; // renameing image
                $image->move($destinationPath,$fileName);
            }
        }
        if (file_exists($destinationPath.$fileName) && ($height != null || $width != null)) {
            self::imageResize($destinationPath.$fileName,$height,$width);
        }
        return $fileName;
    }

    public static function imageResize($imageData = null, $newHeight = null, $newWidth = null)
    {
        header('Content-Type: image/jpeg');
        // Get new sizes
        list($width, $height) = getimagesize($imageData);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($imageData);
        imagecopyresized($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage,$imageData);
        imagedestroy($newImage);
        return;
    }

    public static function verifyIllegation($type)
    {
        $search = [1, 0];
        $replace = ['Yes', 'NO'];
        return str_replace($search, $replace, $type);
    }

    public static function maritalStatus($type)
    {
        $search = [1, 0];
        $replace = ['Married', 'Unmarried'];
        return str_replace($search, $replace, $type);
    }

    public static function gender($type)
    {
        $search = [1,2,3];
        $replace = ['Male','Female','Other'];
        return str_replace($search,$replace,$type);
    }

    public static function userType($type)
    {
        $search = [1,2];
        $replace = ['Admin', 'Employee'];
        return str_replace($search, $replace, $type);
    }

    public static function getStatus($action)
    {
        return str_replace(['inactive', 'active', 'delete'], [0, 1, 2], $action);
    }

    public static function manageStatusButton($status, $id)
    {
        $html = '';
        $html .= '<a href="javascript:;" class="btn btn-success btn-xs"';
        if ($status == 1) {
            $html .= 'style="display:none"';
        }
        $html .= 'onclick="updateStatus(`diagnostic-test`,`active`,' . $id . ')">
                    <i class="fa fa-check-square-o" title="Active"></i>
                </a>';

        $html .= ' <a href="javascript:;" class="btn btn-warning btn-xs"';
        if ($status == 0) {
            $html .= 'style="display:none"';
        }
        $html .= 'onclick="updateStatus(`diagnostic-test`,`inactive`,' . $id . ')">
                    <i class="fa fa-ban" title="Inactive"></i>
                </a>';
        $html .= ' <a id="reference_' . $id . '" class="btn btn-info btn-xs" data-toggle="modal" href="#modal" onclick="loadModalEdit(`diagnostic/edit-diagnosticTest`,' . $id . '">
                <i class="fa fa-edit" title="Edit"></i>
            </a>';
        $html .= ' <a href="javascript:;" class="btn btn-danger btn-xs"';

        if ($status == 2) {
            $html .= 'style="display: none;"';
        }
        $html .= 'onclick="updateStatus(`diagnostic-test`,`delete`,' . $id . ')">
                    <i class="fa fa-trash" title="Delete"></i>
                </a>';
        return $html;
    }

    public static function getTestResultType($type)
    {
        return str_replace(['1', '2', '3'], ['Positive/Negative', 'Yes/No', 'Unit Base'], $type);
    }
}
