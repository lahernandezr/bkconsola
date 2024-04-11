<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserPromotion;

/**
 * UserPromotionSearch represents the model behind the search form of `app\models\UserPromotion`.
 */
class UserPromotionSearch extends UserPromotion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_USER', 'ID_SALE', 'ID_PROMOCION', 'ID_CUSTOMER'], 'integer'],
            [['CREATED_AT'], 'safe'],
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
        $query = UserPromotion::find();

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
            'ID_CUSTOMER' => $this->ID_CUSTOMER,
            'ID_SALE' => $this->ID_SALE,
            'ID_PROMOCION' => $this->ID_PROMOCION,
            'ID_USER' => $this->ID_USER,
            'CREATED_AT' => $this->CREATED_AT,
        ]);

        return $dataProvider;
    }
}
