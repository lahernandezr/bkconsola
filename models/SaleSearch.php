<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sale;

/**
 * SaleSearch represents the model behind the search form of `app\models\Sale`.
 */
class SaleSearch extends Sale
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_USER', 'ID_ADDRESS'], 'integer'],
            [['SUBTOTAL', 'TAXES', 'TOTAL', 'TENDER', 'PAYMENTS', 'CHANGED'], 'number'],
            [['NOTES', 'CREATED_AT'], 'safe'],
            [['ACTIVE'], 'boolean'],
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
        $query = Sale::find();

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
            'ID_USER' => $this->ID_USER,
            'ID_ADDRESS' => $this->ID_ADDRESS,
            'SUBTOTAL' => $this->SUBTOTAL,
            'TAXES' => $this->TAXES,
            'TOTAL' => $this->TOTAL,
            'TENDER' => $this->TENDER,
            'PAYMENTS' => $this->PAYMENTS,
            'CHANGED' => $this->CHANGED,
            'CREATED_AT' => $this->CREATED_AT,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'NOTES', $this->NOTES]);

        return $dataProvider;
    }
}
