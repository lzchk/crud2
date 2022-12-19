<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sale_flag', 'id_company', 'created_by', 'id_category', 'id_comment'], 'integer'],
            [['name', 'sale_price', 'description', 'characteristic', 'rating', 'created_at', 'updated_at', 'price'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sale_flag' => $this->sale_flag,
            'id_company' => $this->id_company,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'id_category' => $this->id_category,
            'id_comment' => $this->id_comment,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sale_price', $this->sale_price])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'characteristic', $this->characteristic])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'price', $this->price]);

        return $dataProvider;
    }
}
