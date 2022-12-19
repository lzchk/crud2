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
 * @property int $id_comment
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
            [['name', 'sale_price', 'sale_flag', 'description', 'characteristic', 'id_company', 'rating', 'created_at', 'updated_at', 'created_by', 'price', 'id_category', 'id_comment'], 'required'],
            [['sale_flag', 'id_company', 'created_by', 'id_category', 'id_comment'], 'integer'],
            [['description', 'characteristic'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['sale_price'], 'string', 'max' => 100],
            [['rating', 'price'], 'string', 'max' => 50],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::class, 'targetAttribute' => ['id_comment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sale_price' => 'Sale Price',
            'sale_flag' => 'флаг - является ли товар акционным',
            'description' => 'Description',
            'characteristic' => 'Characteristic',
            'id_company' => 'Id Company',
            'rating' => 'Rating',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'price' => 'Price',
            'id_category' => 'Id Category',
            'id_comment' => 'Id Comment',
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
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::class, ['id' => 'id_comment']);
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
