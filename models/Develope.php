<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "develope".
 *
 * @property integer $develope_id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $content
 * @property string $tracking_token
 * @property integer $tracking_status
 * @property string $sales
 */
class Develope extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'develope';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'title', 'content', 'tracking_token', 'sales'], 'string'],
            [['title'], 'required'],
            [['tracking_status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'develope_id' => 'Develope ID',
            'name' => 'Name',
            'email' => 'Email',
            'title' => 'Title',
            'content' => 'Content',
            'tracking_token' => 'Tracking Token',
            'tracking_status' => 'Tracking Status',
            'sales' => 'Sales',
        ];
    }
}
