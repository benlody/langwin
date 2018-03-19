<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $client_group_id
 * @property string $chinese_name
 * @property string $english_name
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chinese_name', 'english_name'], 'required'],
            [['chinese_name', 'english_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_group_id' => 'Client Group ID',
            'chinese_name' => 'Chinese Name',
            'english_name' => 'English Name',
        ];
    }
}
