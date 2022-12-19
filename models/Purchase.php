<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property int $id
 * @property int $id_product
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
            [['id_product', 'delivery_method', 'full_price', 'id_delivery', 'id_card', 'created_at', 'full_sale'], 'required'],
            [['id_product', 'id_delivery', 'id_card'], 'integer'],
            [['delivery_method'], 'string'],
            [['created_at'], 'safe'],
            [['full_price'], 'string', 'max' => 10],
            [['full_sale'], 'string', 'max' => 20],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
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
            'id_product' => 'Id Product',
            'delivery_method' => 'Delivery Method',
            'full_price' => 'Full Price',
            'id_delivery' => 'Id Delivery',
            'id_card' => 'Id Card',
            'created_at' => 'Created At',
            'full_sale' => 'Full Sale',
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

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }
}
