<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "designer".
 *
 * @property string $designer_id
 * @property string $title
 * @property string $desc
 * @property string $facebook
 * @property string $instagram
 * @property string $behance
 * @property string $website
 * @property string $email
 * @property string $photo
 * @property string $thumb1
 * @property string $thumb2
 * @property string $thumb3
 */
class Designer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designer_id', 'title', 'facebook', 'instagram', 'behance', 'website', 'email', 'thumb1', 'thumb2', 'thumb3'], 'required'],
            [['title', 'desc', 'facebook', 'instagram', 'behance', 'website', 'email', 'photo', 'thumb1', 'thumb2', 'thumb3'], 'string'],
            [['designer_id'], 'string', 'max' => 32],
            [['designer_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'designer_id' => 'Designer ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'behance' => 'Behance',
            'website' => 'Website',
            'email' => 'Email',
            'photo' => 'Photo',
            'thumb1' => 'Thumb1',
            'thumb2' => 'Thumb2',
            'thumb3' => 'Thumb3',
        ];
    }
}
