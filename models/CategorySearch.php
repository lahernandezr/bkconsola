<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_TAX', 'ORDER'], 'integer'],
            [['NAME', 'BACKGROUND', 'FORECOLOR', 'INIT', 'END'], 'safe'],
            [['ONSALE', 'ACTIVE'], 'boolean'],
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
        $query = Category::find();

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
            'ID_TAX' => $this->ID_TAX,
            'ORDER' => $this->ORDER,
            'ONSALE' => $this->ONSALE,
            'INIT' => $this->INIT,
            'END' => $this->END,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'BACKGROUND', $this->BACKGROUND])
            ->andFilterWhere(['like', 'FORECOLOR', $this->FORECOLOR]);
            // ->andFilterWhere(['like', 'IMAGE', $this->IMAGE]);

        return $dataProvider;
    }
}
