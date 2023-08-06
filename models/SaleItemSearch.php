<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SaleItem;

/**
 * SaleItemSearch represents the model behind the search form of `app\models\SaleItem`.
 */
class SaleItemSearch extends SaleItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_SALE', 'ID_CATEGORY', 'ID_ITEM', 'ID_TAX'], 'integer'],
            [['BARCODE', 'NAME'], 'safe'],
            [['PRICE_COST', 'PRICE_SELL', 'QUANTITY', 'TAXES', 'TOTAL'], 'number'],
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
        $query = SaleItem::find();

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
            'ID_CATEGORY' => $this->ID_CATEGORY,
            'ID_ITEM' => $this->ID_ITEM,
            'PRICE_COST' => $this->PRICE_COST,
            'PRICE_SELL' => $this->PRICE_SELL,
            'QUANTITY' => $this->QUANTITY,
            'ID_TAX' => $this->ID_TAX,
            'TAXES' => $this->TAXES,
            'TOTAL' => $this->TOTAL,
        ]);

        $query->andFilterWhere(['like', 'BARCODE', $this->BARCODE])
            ->andFilterWhere(['like', 'NAME', $this->NAME]);

        return $dataProvider;
    }
}
