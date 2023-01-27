<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property string $delivery_method
 * @property string $full_price
 * @property int $id_delivery
 * @property int $id_card
 * @property string $created_at
 * @property string $full_sale
 *
 * @property BankCard $card
 * @property DeliveryAddress $delivery
 * @property Product $product
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_method', 'full_price', 'id_delivery', 'id_card', 'full_sale'], 'required'],
            [['id_delivery', 'id_card'], 'integer'],
            [['delivery_method'], 'string'],
            [['created_at'], 'safe'],
            [['full_price'], 'string', 'max' => 10],
            [['full_sale'], 'string', 'max' => 20],
            [['id_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_card' => 'id']],
            [['id_delivery'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryAddress::class, 'targetAttribute' => ['id_delivery' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_method' => 'Метод доставки',
            'full_price' => 'Цена',
            'id_delivery' => 'Id Доставки',
            'id_card' => 'Карта',
            'created_at' => 'Создание',
            'full_sale' => 'Скидка',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(BankCard::class, ['id' => 'id_card']);
    }

    /**
     * Gets query for [[Delivery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(DeliveryAddress::class, ['id' => 'id_delivery']);
    }
}
