<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $client_id
 * @property string $name
 * @property string $desc
 * @property string $contact
 * @property string $logo
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'title', 'desc', 'contact', 'logo'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Company ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'contact' => 'Contact',
            'logo' => 'Logo',
        ];
    }
}
