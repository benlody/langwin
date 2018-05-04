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
			[['portfolio_id', 'spec', 'content', 'title', 'description', 'thumb', 'tag', 'designer_id', 'company_id'], 'string'],
			[['photo_uploaded'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'portfolio_id' => 'Portfolio ID',
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


class ExcelUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;

    public function rules()
    {
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xls, xlsx'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->excelFile->saveAs('uploads/' . $this->excelFile->baseName . '.' . $this->excelFile->extension);
            return true;
        } else {
            return false;
        }
    }
}