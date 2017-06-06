<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class ImgUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imgFile;

    public function rules()
    {
        return [
            [['imgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif', 'maxFiles' => 0],
        ];
    }
    
    public function upload($name)
    {
        if ($this->validate()) {
            mkdir('./images/'.$name, 0777, true);
            foreach ($this->imgFile as $file) {
                $file->saveAs('images/'.$name.'/'. $file->baseName . '.' . $file->extension);
            }
            return $file->baseName . '.' . $file->extension;
        } else {
            return false;
        }
    }

    public function upload_designer($name)
    {
        if ($this->validate()) {
            foreach ($this->imgFile as $file) {
                $file->saveAs('designer/'. $name . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}