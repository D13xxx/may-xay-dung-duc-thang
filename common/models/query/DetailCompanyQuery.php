<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetailCompany;

/**
 * DetailCompanyQuery represents the model behind the search form of `common\models\DetailCompany`.
 */
class DetailCompanyQuery extends DetailCompany
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gioi_thieu_cong_ty', 'tuyen_dung'], 'safe'],
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
        $query = DetailCompany::find();

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

        $query->andFilterWhere(['like', 'gioi_thieu_cong_ty', $this->gioi_thieu_cong_ty])
            ->andFilterWhere(['like', 'tuyen_dung', $this->tuyen_dung]);

        return $dataProvider;
    }
}
