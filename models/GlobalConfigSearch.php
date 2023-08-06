<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GlobalConfig;

/**
 * GlobalConfigSearch represents the model behind the search form of `app\models\GlobalConfig`.
 */
class GlobalConfigSearch extends GlobalConfig
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'VALUE', 'DESCRIPTION'], 'safe'],
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
        $query = GlobalConfig::find();

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
        $query->andFilterWhere(['like', 'ID', $this->ID])
            ->andFilterWhere(['like', 'VALUE', $this->VALUE])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION]);

        return $dataProvider;
    }
}
