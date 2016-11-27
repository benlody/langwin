<?php

namespace app\models;

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
            [['name', 'spec', 'content'], 'string'],
            [['designer_id', 'company_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'portfolio_id' => 'Portfolio ID',
            'name' => 'Name',
            'spec' => 'Spec',
            'content' => 'Content',
            'designer_id' => 'Designer ID',
            'company_id' => 'Company ID',
        ];
    }
}
