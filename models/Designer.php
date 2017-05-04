<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "designer".
 *
 * @property integer $designer_id
 * @property string $name
 * @property string $desc
 * @property string $contact
 * @property string $photo
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
            [['name', 'title', 'desc', 'contact', 'photo'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'designer_id' => 'Designer ID',
            'name' => 'Name',
            'title' => 'Title',
            'desc' => 'Desc',
            'contact' => 'Contact',
            'photo' => 'Photo',
        ];
    }
}


