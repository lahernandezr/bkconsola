<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form of `app\models\Item`.
 */
class ItemSearch extends Item
{
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_CATEGORY', 'ID_TAX'], 'integer'],
            [['NAME', 'DESCRIPCION', 'BARCODE', 'IMAGE', 'INIT', 'END'], 'safe'],
            [['PRICE_COST', 'PRICE_SELL','PRICE_TAX'], 'number'],
            [['ON_SALE', 'ACTIVE'], 'boolean'],
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
        $query = Item::find()->orderBy([
            'ID_PARENT' => SORT_ASC,
            'ID'=>SORT_ASC            
          ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'BARCODE',
                'NAME',
                'ID_TAX',
                'ID_CATEGORY',
                'ACTIVE',
                'PRICE_TAX',
            ]
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
            'ID_CATEGORY' => $this->ID_CATEGORY,
            'PRICE_COST' => $this->PRICE_COST,
            'PRICE_SELL' => $this->PRICE_SELL,
            'ID_TAX' => $this->ID_TAX,
            'PRICE_TAX' => $this->PRICE_TAX,
            'ON_SALE' => $this->ON_SALE,
            'INIT' => $this->INIT,
            'END' => $this->END,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'BARCODE', $this->BARCODE])
            // ->andFilterWhere(['like', 'IMAGE', $this->IMAGE])
            ->andFilterWhere(['like', 'PRICE_TAX', $this->PRICE_TAX]);

        return $dataProvider;
    }

    public function searchParent($ID)
    {
        //$query = Item::find()->where(['ID_PARENT' => $ID]);
        $query = Item::find()->where(['=','ID_PARENT' ,$ID])->andWhere('ID_PARENT <> ID');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            /*
            'attributes' => [
                'BARCODE',
                'NAME',
                'ID_TAX',
                'ID_CATEGORY',
                'ACTIVE',
                'PRICE_TAX',
            ]*/
        ]);

        $this->load(null);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'ID_CATEGORY' => $this->ID_CATEGORY,
            'PRICE_COST' => $this->PRICE_COST,
            'PRICE_SELL' => $this->PRICE_SELL,
            'ID_TAX' => $this->ID_TAX,
            'PRICE_TAX' => $this->PRICE_TAX,
            'ON_SALE' => $this->ON_SALE,
            'INIT' => $this->INIT,
            'END' => $this->END,
            'ACTIVE' => $this->ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'BARCODE', $this->BARCODE])
            // ->andFilterWhere(['like', 'IMAGE', $this->IMAGE])
            ->andFilterWhere(['like', 'PRICE_TAX', $this->PRICE_TAX]);

        return $dataProvider;
    }
}
