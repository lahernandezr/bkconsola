<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;
use kartik\daterange\DateRangeBehavior;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
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
            [['ID', 'ID_COUNTRY'], 'integer'],
            [['USERNAME', 'PASSWORD', 'EMAIL', 'FULLNAME', 'PHONE', 'WHATSAPP', 'BIRTHDATE', 'ID_GENDER', 'TYPE_REGISTRATION', 'ID_REGISTRATION', 'CREATED_AT'], 'safe'],
            [['IS_OTP', 'ACTIVE'], 'boolean'],
            // [['created_at_range'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
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
        

        $query = Customer::find();

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

        //Convierte la cadena en un arreglo con las dos fechas
        if(!empty($this->created_at_range)) {
            $fechas = explode(' - ', $this->created_at_range); 
            if( (bool)strtotime($fechas[0]) && (bool)strtotime($fechas[1]) ){
                $this->createTimeStart = $fechas[0];
                $this->createTimeEnd = $fechas[1];
            }
        }
        

         // Agregar condicion de rango de fechas 
        $query->andFilterWhere(['>=', 'CREATED_AT', $this->createTimeStart])
        ->andFilterWhere(['<', 'CREATED_AT', $this->createTimeEnd]); 

        // if(!empty($this->created_at_range) && strpos($this->created_at_range, '-') !== false) {
		// 	list($start_date, $end_date) = explode(' - ', $this->created_at_range);
		// 	$query->andFilterWhere(['between', 'CREATED_AT', strtotime($start_date), strtotime($end_date)]);
		// }		

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'ID_COUNTRY' => $this->ID_COUNTRY,
            // 'CREATED_AT' => $this->CREATED_AT,
            'IS_OTP' => $this->IS_OTP,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'FULLNAME', $this->FULLNAME])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE])
            ->andFilterWhere(['like', 'WHATSAPP', $this->WHATSAPP])
            ->andFilterWhere(['like', 'BIRTHDATE', $this->BIRTHDATE])
            ->andFilterWhere(['like', 'ID_GENDER', $this->ID_GENDER])
            ->andFilterWhere(['like', 'TYPE_REGISTRATION', $this->TYPE_REGISTRATION])
            ->andFilterWhere(['like', 'ID_REGISTRATION', $this->ID_REGISTRATION]);

        return $dataProvider;
    }
}
