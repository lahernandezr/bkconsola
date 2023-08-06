<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enterprise;

/**
 * EnterpriseSearch represents the model behind the search form of `app\models\Enterprise`.
 */
class EnterpriseSearch extends Enterprise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ACTIVE'], 'integer'],
            [['CODE', 'NAME', 'ADDRESS', 'NIT', 'RUT', 'EMAIL', 'CONTACT', 'PHONE', 'CREATED_AT'], 'safe'],
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
        $query = Enterprise::find();

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
            'ID' => $this->ID,
            'CREATED_AT' => $this->CREATED_AT,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'CODE', $this->CODE])
            ->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS])
            ->andFilterWhere(['like', 'NIT', $this->NIT])
            ->andFilterWhere(['like', 'RUT', $this->RUT])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'CONTACT', $this->CONTACT])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE]);

        return $dataProvider;
    }
}
