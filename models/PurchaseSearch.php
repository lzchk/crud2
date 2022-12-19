<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Purchase;

/**
 * PurchaseSearch represents the model behind the search form of `app\models\Purchase`.
 */
class PurchaseSearch extends Purchase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_product', 'id_delivery', 'id_card'], 'integer'],
            [['delivery_method', 'full_price', 'created_at', 'full_sale'], 'safe'],
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
        $query = Purchase::find();

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
            'id_product' => $this->id_product,
            'id_delivery' => $this->id_delivery,
            'id_card' => $this->id_card,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'delivery_method', $this->delivery_method])
            ->andFilterWhere(['like', 'full_price', $this->full_price])
            ->andFilterWhere(['like', 'full_sale', $this->full_sale]);

        return $dataProvider;
    }
}
