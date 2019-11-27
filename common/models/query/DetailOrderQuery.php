<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetailOrder;

/**
 * DetailOrderQuery represents the model behind the search form of `common\models\DetailOrder`.
 */
class DetailOrderQuery extends DetailOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'order_product_id', 'amount', 'id'], 'integer'],
            [['price_pro'], 'number'],
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
        $query = DetailOrder::find();

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
            'product_id' => $this->product_id,
            'order_product_id' => $this->order_product_id,
            'amount' => $this->amount,
            'id' => $this->id,
            'price_pro' => $this->price_pro,
        ]);

        return $dataProvider;
    }
}