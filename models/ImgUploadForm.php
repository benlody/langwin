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

			$dir = './images/'.$name;
			if (!file_exists($dir) && !is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
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
			return $name . '.' . $file->extension;
		} else {
			return false;
		}
	}
    public function upload_client($name)
    {
        if ($this->validate()) {
            foreach ($this->imgFile as $file) {
                $file->saveAs('client/'. $name . '.' . $file->extension);
            }
            return $name . '.' . $file->extension;
        } else {
            return false;
        }
    }
}