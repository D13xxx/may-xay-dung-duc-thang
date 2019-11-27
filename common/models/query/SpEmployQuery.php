<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SpEmploy;

/**
 * SpEmployQuery represents the model behind the search form of `common\models\SpEmploy`.
 */
class SpEmployQuery extends SpEmploy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['huong_dan_thanh_toan', 'chinh_sach_giao_hang', 'chinh_sach_hoi_tra', 'chinh_sach_bao_mat_thong_tin'], 'safe'],
            [['id'], 'integer'],
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
        $query = SpEmploy::find();

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
        ]);

        $query->andFilterWhere(['like', 'huong_dan_thanh_toan', $this->huong_dan_thanh_toan])
            ->andFilterWhere(['like', 'chinh_sach_giao_hang', $this->chinh_sach_giao_hang])
            ->andFilterWhere(['like', 'chinh_sach_hoi_tra', $this->chinh_sach_hoi_tra])
            ->andFilterWhere(['like', 'chinh_sach_bao_mat_thong_tin', $this->chinh_sach_bao_mat_thong_tin]);

        return $dataProvider;
    }
}
