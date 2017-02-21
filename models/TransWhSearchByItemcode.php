<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransWh;



/**
 * TransWhSearch represents the model behind the search form of `app\models\TransWh`.
 */
class TransWhSearchByItemcode extends TransWh
{
    /**
     * @inheritdoc
     */
    public $receive;
    
    public function rules()
    {
        return [
            [['id', 'trans_code', 'trans_qty', 'item_id', 'projectsub_id'], 'integer'],           
            [['date_create', 'po_number', 'location', 
                'name_user_take', 'from_to', 'grpo_number', 'item_name', 'itemcode'], 'safe'],
            [['projectsub_dscription'],'string'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TransWh::find()->select(['a.id', 'b.itemcode'
                , 'receive'=>'sum(if(a.trans_code=1, a.trans_qty, 0))'
                , 'issued' => 'sum(if(a.trans_code=2, a.trans_qty, 0))'                
                , 'saldo' => 'sum(if(a.trans_code=1, a.trans_qty, 0))-sum(if(a.trans_code=2, a.trans_qty, 0))'
                , 'item_name'
                , 'item_id',
            ])
            //->select('a.id' ,'b.item_name', 'b.item_uom')
            ->alias('a')
            ->with('item')            
            //->from('trans_wh as a')
            ->innerJoin('item as b', 'b.id = a.item_id')
            ->groupBy('a.item_id');

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
            'a.id' => $this->id,
            //'date_create' => $this->date_create,
            //'trans_code' => $this->trans_code,
            //'trans_qty' => $this->trans_qty,
            //'item_id' => $this->item_id,
            //'projectsub_id' => $this->projectsub_id,
            //'b.itemcode' => $this->itemcode,
        ]);

        $query
            //->andFilterWhere(['like', 'po_number', $this->po_number])
            //->andFilterWhere(['like', 'location', $this->location])
            //->andFilterWhere(['like', 'name_user_take', $this->name_user_take])
            //->andFilterWhere(['like', 'from_to', $this->from_to])
            //->andFilterWhere(['like', 'grpo_number', $this->grpo_number])
            //->andFilterWhere(['like', 'projectsub_dscription', $this->projectsub_dscription])
            ->andFilterWhere(['like', 'itemcode', $this->itemcode])
            ->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
