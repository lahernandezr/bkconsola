<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form of `app\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_ITEM', 'LIMIT_EXCHANGE', 'REDIMM'], 'integer'],
            [['CODE', 'NAME', 'DESCRIPTION', 'ID_TYPE_PROMOTION', 'TYPE_DISC', 'INIT', 'END', 'IMAGE', 'LINK'], 'safe'],
            [['VALUE'], 'number'],
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
        $query = Promotion::find();

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
            'VALUE' => $this->VALUE,
            'ID_ITEM' => $this->ID_ITEM,
            'INIT' => $this->INIT,
            'END' => $this->END,
            'LIMIT_EXCHANGE' => $this->LIMIT_EXCHANGE,
            'REDIMM' => $this->REDIMM,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'CODE', $this->CODE])
            ->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION])
            ->andFilterWhere(['like', 'ID_TYPE_PROMOTION', $this->ID_TYPE_PROMOTION])
            ->andFilterWhere(['like', 'TYPE_DISC', $this->TYPE_DISC])
            ->andFilterWhere(['like', 'IMAGE', $this->IMAGE])
            ->andFilterWhere(['like', 'LINK', $this->LINK]);

        return $dataProvider;
    }
}
