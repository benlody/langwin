<?php

namespace app\models;

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
            [['name', 'desc', 'contact', 'photo'], 'string'],
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
            'desc' => 'Desc',
            'contact' => 'Contact',
            'photo' => 'Photo',
        ];
    }
}