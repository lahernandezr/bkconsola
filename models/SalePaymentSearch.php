<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalePayment;

/**
 * SalePaymentSearch represents the model behind the search form of `app\models\SalePayment`.
 */
class SalePaymentSearch extends SalePayment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_SALE'], 'integer'],
            [['TYPE_PAYMENT', 'NUMBER'], 'safe'],
            [['AMOUNT', 'TOTAL'], 'number'],
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
        $query = SalePayment::find();

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
            'ID_SALE' => $this->ID_SALE,
            'AMOUNT' => $this->AMOUNT,
            'TOTAL' => $this->TOTAL,
        ]);

        $query->andFilterWhere(['like', 'TYPE_PAYMENT', $this->TYPE_PAYMENT])
            ->andFilterWhere(['like', 'NUMBER', $this->NUMBER]);

        return $dataProvider;
    }
}
