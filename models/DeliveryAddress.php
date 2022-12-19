<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_address".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name "работа", "дом"
 * @property int $id_city
 * @property string $street
 * @property string $house_number может быть литера или корпус
 * @property int $flat_number
 * @property string $comment
 *
 * @property Purchase[] $purchases
 * @property User $user
 */
class DeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'id_city', 'street', 'house_number', 'flat_number', 'comment'], 'required'],
            [['id_user', 'id_city', 'flat_number'], 'integer'],
            [['comment'], 'string'],
            [['name', 'street'], 'string', 'max' => 100],
            [['house_number'], 'string', 'max' => 10],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'name' => 'Name',
            'id_city' => 'Id City',
            'street' => 'Street',
            'house_number' => 'Номер дома',
            'flat_number' => 'Flat Number',
            'comment' => 'Comment',
        ];
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['id_delivery' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
