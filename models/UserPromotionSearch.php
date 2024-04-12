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
    public $customer;
    public $user;
    public $promotion;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_USER', 'ID_SALE', 'ID_PROMOCION', 'ID_CUSTOMER'], 'integer'],
            [['CREATED_AT','customer', 'user', 'promotion'], 'safe'],
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
        $query = UserPromotion::find()->alias('a1');

        // add conditions that should always apply here

        $query->joinWith(['customer', 'user', 'promotion']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['customer'] = [
            'asc' => ['app_customer.EMAIL' => SORT_ASC],
            'desc' => ['app_customer.EMAIL' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['user'] = [
            'asc' => ['app_user.USERNAME' => SORT_ASC],
            'desc' => ['app_user.USERNAME' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['promotion'] = [
            'asc' => ['app_promotion.CODE' => SORT_ASC],
            'desc' => ['app_promotion.CODE' => SORT_DESC],
        ];

        // $this->load($params);

        // if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
        //     return $dataProvider;
        // }

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'a1.ID' => $this->ID,
            // 'ID_CUSTOMER' => $this->ID_CUSTOMER,
            // 'ID_SALE' => $this->ID_SALE,
            // 'ID_PROMOCION' => $this->ID_PROMOCION,
            'ID_USER' => $this->ID_USER,
            'a1.CREATED_AT' => $this->CREATED_AT,
        ])->andFilterWhere(['like', 'app_customer.EMAIL', $this->customer])
        // ->andFilterWhere(['like', 'app_user.USERNAME', $this->user])
        ->andFilterWhere(['like', 'app_promotion.CODE', $this->promotion]);

        return $dataProvider;
    }
}
