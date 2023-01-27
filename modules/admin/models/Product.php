<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $sale_price
 * @property int $sale_flag флаг - является ли товар акционным
 * @property string $description
 * @property string $characteristic
 * @property int $id_company
 * @property string $rating
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property string $price
 * @property int $id_category
 *
 * @property Basket[] $baskets
 * @property Category $category
 * @property Comment $comment
 * @property Company $company
 * @property User $createdBy
 * @property ImgProduct[] $imgProducts
 * @property Like[] $likes
 * @property Purchase[] $purchases
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sale_price', 'sale_flag', 'description', 'characteristic', 'id_company', 'rating', 'created_at', 'updated_at', 'created_by', 'price', 'id_category'], 'required'],
            [['sale_flag', 'id_company', 'created_by', 'id_category'], 'integer'],
            [['description', 'characteristic'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['sale_price'], 'string', 'max' => 100],
            [['rating', 'price'], 'string', 'max' => 50],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
       ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'sale_price' => 'Акционная цена',
            'sale_flag' => 'флаг - является ли товар акционным',
            'description' => 'Описание',
            'characteristic' => 'Характеристика',
            'id_company' => 'Id Компании',
            'rating' => 'Рейтинг',
            'created_at' => 'Создание',
            'updated_at' => 'Обновление',
            'created_by' => 'Создатель',
            'price' => 'Цена',
            'id_category' => 'Id Категории',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[ImgProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgProducts()
    {
        return $this->hasMany(ImgProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['id_product' => 'id']);
    }
}
