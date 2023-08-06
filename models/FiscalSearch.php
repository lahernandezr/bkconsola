<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fiscal;

/**
 * FiscalSearch represents the model behind the search form of `app\models\Fiscal`.
 */
class FiscalSearch extends Fiscal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'INIT', 'END', 'CURRENT'], 'integer'],
            [['TYPE', 'AUTH_RESOLUTION', 'AUTH_DATE', 'SERIE', 'CREATED_AT'], 'safe'],
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
        $query = Fiscal::find();

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
            'INIT' => $this->INIT,
            'END' => $this->END,
            'CURRENT' => $this->CURRENT,
            'CREATED_AT' => $this->CREATED_AT,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'TYPE', $this->TYPE])
            ->andFilterWhere(['like', 'AUTH_RESOLUTION', $this->AUTH_RESOLUTION])
            ->andFilterWhere(['like', 'AUTH_DATE', $this->AUTH_DATE])
            ->andFilterWhere(['like', 'SERIE', $this->SERIE]);

        return $dataProvider;
    }
}
