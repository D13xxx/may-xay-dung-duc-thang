<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsQuery represents the model behind the search form of `common\models\Products`.
 */
class ProductsQuery extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'status','guarantce', 'sale_number', 'is_new', 'is_hot_new', 'cat_id', 'type', 'brand', 'views'], 'integer'],
            [['full_name', 'description', 'slug', 'content', 'avatar', 'code', ], 'safe'],
            [['price', 'exp_price'], 'number'],
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
        $query = Products::find();

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
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'guarantce' => $this->guarantce,
            'exp_price' => $this->exp_price,
            'sale_number' => $this->sale_number,
            'is_new' => $this->is_new,
            'is_hot_new' => $this->is_hot_new,
            'cat_id' => $this->cat_id,
            'type' => $this->type,
            'brand' => $this->brand,
            'views' => $this->views,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'code', $this->code]);
        return $dataProvider;
    }
}
