<?php

namespace app\admin\models;

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
 * @property string $name
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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $passwordConfirm;
    public $agree;

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
            [['email', 'phone', 'login', 'password', 'id_city', 'date_of_birth', 'sex', 'currency', 'passwordConfirm', 'agree', 'name'], 'required', 'message' => 'Поле обязательно для заполнения!'],
            [['phone'], 'string', 'max' => 100],
            [['phone'], 'unique'],
            [['id_city'], 'number'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['currency'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 120],
            [['name'], 'string', 'max' => 120],
            ['name', 'match', 'pattern' => '#[А-Яа-я\- ]+#', 'message' => 'Только кириллица, пробелы и дефисы'],
            [['login', 'password'], 'string', 'max' => 50],
            ['login', 'match', 'pattern' => '/^[a-zA-Z]{1,}$/u', 'message' => 'Только латинские буквы!'],
            ['login', 'unique', 'message' => 'Такой логин уже используется!'],
            ['email', 'email', 'message' => 'Некорректный email!'], ['email', 'unique', 'message' => 'Такой email уже используется!'],
            [['avatar'], 'string', 'max' => 300],
            [['role'], 'string', 'max' => 20],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны сопадать!'],
            [['agree'], 'boolean'],
            [['agree'], 'compare', 'compareValue' => true, 'message' => 'Необходимо дать согласие!'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'email' => 'Email',
            'phone' => 'Телефон',
            'login' => 'Логин',
            'password' => 'Пароль',
            'passwordConfirm' => 'Подтверждение пароля',
            'id_city' => 'Город',
            'date_of_birth' => 'День рождения',
            'sex' => 'Пол',
            'avatar' => 'Автар',
            'currency' => 'Валюта',
            'role' => 'Роль',
            'agree' => 'Даю согласие на обработку персональных данных.',
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

    ########################################
    #Реализация интерфейса
    ########################################

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {

    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
