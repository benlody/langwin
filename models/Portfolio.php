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
            [['date'], 'safe'],
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
            'date' => 'Date',
			'tag' => 'Tag',
			'thumb' => 'Thumb',
			'designer_id' => 'Designer ID',
			'company_id' => 'Company ID',
		];
	}
}


