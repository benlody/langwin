<?php

namespace app\models;
use yii\db\Query;

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
			[['client_group_id'], 'integer'],

		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'client_id' => 'Company ID',
            'client_group_id' => 'Client Group ID',
			'title' => 'Title',
			'desc' => 'Desc',
			'contact' => 'Contact',
			'logo' => 'Logo',
		];
	}

	public function getGroupname()
	{

		$query = new Query;
		$group = array();
		$group_q = $query->select('client_group_id,'.'chinese_name')
			->from('group')
			->all();
		foreach ($group_q as $key => $value) {
			$group[$value['client_group_id']] = $value['chinese_name'];
		}

		return $group[$this->client_group_id];
	}

}
