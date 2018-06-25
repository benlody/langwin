<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property integer $quotation_id
 * @property string $company
 * @property string $product
 * @property string $contact
 * @property string $tel
 * @property string $email
 * @property string $link
 * @property string $content
 * @property string $sales
 * @property integer $status
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'contact', 'tel', 'email'], 'required'],
            [['company', 'product', 'contact', 'tel', 'email', 'link', 'content', 'sales'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quotation_id' => 'Quotation ID',
            'company' => 'Company',
            'product' => 'Product',
            'contact' => 'Contact',
            'tel' => 'Tel',
            'email' => 'Email',
            'link' => 'Link',
            'content' => 'Content',
            'sales' => 'Sales',
            'status' => 'Status',
        ];
    }
}
