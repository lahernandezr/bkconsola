<?php

namespace app\models;

use yii\base\Model;
use app\models\UserPromotion;
use yii\data\ActiveDataProvider;
use kartik\daterange\DateRangeBehavior;

/**
 * UserPromotionSearch represents the model behind the search form of `app\models\UserPromotion`.
 */
class UserPromotionSearch extends UserPromotion
{
    public $customer;
    public $user;
    public $promotion;
    public $created_at_range;
    public $createTimeStart;
    public $createTimeEnd;
    
    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(), 
                'attribute' => 'created_at_range',
                'dateStartAttribute' => 'createTimeStart',
                'dateEndAttribute' => 'createTimeEnd',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_USER', 'ID_SALE', 'ID_PROMOCION', 'ID_CUSTOMER'], 'integer'],
            [['CREATED_AT','customer', 'user', 'promotion'], 'safe'],
            [['created_at_range'], 'safe'],
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

        
        //Convierte la cadena en un arreglo con las dos fechas
        if(!empty($this->created_at_range)) {
            $fechas = explode(' - ', $this->created_at_range); 
            if( (bool)strtotime($fechas[0]) && (bool)strtotime($fechas[1]) ){
                $this->createTimeStart = $fechas[0];
                $this->createTimeEnd = $fechas[1];
            }
        }
        
        $query->andFilterWhere(['>=', 'CREATED_AT', $this->createTimeStart])
        ->andFilterWhere(['<', 'CREATED_AT', $this->createTimeEnd]);

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
