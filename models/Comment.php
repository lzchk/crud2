<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $id_user
 * @property string $text
 * @property int $rating
 * @property string $created_at
 * @property string $updated_at
 * @property string $id_prod
 *
 * @property Product[] $products
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'rating', 'id_prod'], 'required'],
            [['id_user', 'rating'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_prod' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'text' => 'Текст',
            'rating' => 'Рейтинг',
            'created_at' => 'Опубликован',
            'updated_at' => 'Изменен',
            'id_prod' => 'Продукт'
        ];
    }


    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_comment' => 'id']);
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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),            
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,            
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => TimestampBehavior::className(),            
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',          
                'value' => new Expression('NOW()'),
            ],     
        ];
    }
}

