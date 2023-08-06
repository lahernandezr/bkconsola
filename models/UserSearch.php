<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ID_ROL', 'ACTIVE', 'CREATED_AT', 'LAST_ACCESS'], 'integer'],
            [['FULLNAME', 'USERNAME', 'AUTHKEY', 'PASSWORD', 'password_reset_token', 'EMAIL', 'PHONE', 'BITHDATE', 'IDENTIFICATION', 'verification_token'], 'safe'],
            [['IS_OTP'], 'boolean'],
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
        $query = User::find();

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
            'ID_ROL' => $this->ID_ROL,
            'IS_OTP' => $this->IS_OTP,
            'ACTIVE' => $this->ACTIVE,
            'CREATED_AT' => $this->CREATED_AT,
            'LAST_ACCESS' => $this->LAST_ACCESS,
        ]);

        $query->andFilterWhere(['like', 'FULLNAME', $this->FULLNAME])
            ->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'auth_key', $this->AUTHKEY])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE])
            ->andFilterWhere(['like', 'BITHDATE', $this->BITHDATE])
            ->andFilterWhere(['like', 'IDENTIFICATION', $this->IDENTIFICATION])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        return $dataProvider;
    }
}
