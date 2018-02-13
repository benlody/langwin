<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_tag_relation".
 *
 * @property string $portfolio_id
 * @property integer $tag_id
 */
class PortfolioTagRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_tag_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'tag_id'], 'required'],
            [['tag_id'], 'integer'],
            [['portfolio_id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'portfolio_id' => 'Portfolio ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
