<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Set;

/**
 * SetSearch represents the model behind the search form about `app\models\Set`.
 */
class SetSearch extends Set
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'art', 'img_id', 'is_promo', 'galery_1', 'galery_2', 'galery_3'], 'integer'],
            [['name', 'brief_description', 'full_description'], 'safe'],
            [['price', 'price_without_discount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Set::find();

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
            'art' => $this->art,
            'price' => $this->price,
            'price_without_discount' => $this->price_without_discount,
            'img_id' => $this->img_id,
            'is_promo' => $this->is_promo,
            'galery_1' => $this->galery_1,
            'galery_2' => $this->galery_2,
            'galery_3' => $this->galery_3,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'brief_description', $this->brief_description])
            ->andFilterWhere(['like', 'full_description', $this->full_description]);

        return $dataProvider;
    }
}
