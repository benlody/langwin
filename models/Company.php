<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property string $name
 * @property string $desc
 * @property string $contact
 * @property string $logo
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'desc', 'contact', 'logo'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'name' => 'Name',
            'desc' => 'Desc',
            'contact' => 'Contact',
            'logo' => 'Logo',
        ];
    }
}
