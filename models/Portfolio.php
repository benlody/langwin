<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $portfolio_id
 * @property string $name
 * @property string $spec
 * @property string $content
 * @property integer $designer_id
 * @property integer $company_id
 */
class Portfolio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'portfolio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'spec', 'content', 'title', 'description', 'thumb', 'tag'], 'string'],
			[['designer_id', 'company_id'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'portfolio_id' => 'Portfolio ID',
			'name' => 'Name',
			'title' => 'Title',
			'spec' => 'Spec',
			'content' => 'Content',
			'description' => 'Description',
			'tag' => 'Tag',
			'thumb' => 'Thumb',
			'designer_id' => 'Designer ID',
			'company_id' => 'Company ID',
		];
	}
}

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
            return true;
		} else {
			return false;
		}
	}
}