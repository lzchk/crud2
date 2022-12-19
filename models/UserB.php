<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property int $phone
 * @property string $login
 * @property string $password
 * @property int $id_city потому что самое длинное название города в мире - 168 символов
 * @property string $date_of_birth
 * @property string $sex
 * @property string $avatar
 * @property float $currency валюта
 * @property string $role
 *
 * @property BankCard[] $bankCards
 * @property Basket[] $baskets
 * @property City $city
 * @property Comment[] $comments
 * @property Company[] $companies
 * @property Company[] $companies0
 * @property DeliveryAddress[] $deliveryAddresses
 * @property Like[] $likes
 * @property Product[] $products
 */
class UserB extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'login', 'password', 'id_city', 'date_of_birth', 'sex', 'currency', 'role'], 'required'],
            [['phone'], 'string', 'max' => 100],
            [['id_city'], 'number'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['currency'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 120],
            [['login', 'password'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 300],
            [['role'], 'string', 'max' => 20],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'login' => 'Login',
            'password' => 'Password',
            'id_city' => 'City',
            'date_of_birth' => 'Date Of Birth',
            'sex' => 'Sex',
            'avatar' => 'Avatar',
            'currency' => 'валюта',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[BankCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCards()
    {
        return $this->hasMany(BankCard::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Companies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies0()
    {
        return $this->hasMany(Company::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[DeliveryAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['created_by' => 'id']);
    }
}
