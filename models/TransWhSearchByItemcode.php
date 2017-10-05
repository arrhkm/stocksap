<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransWh;
use yii\db\Query;




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
            [['id', 'trans_code', 'trans_qty', 'item_id', 'projectsub_id', 'pr_number'], 'integer'],           
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
        /*ORI */

        /*
        $query = TransWh::find()->select(['a.id', 'b.itemcode'
                , 'receive'=>'sum(if(a.trans_code=1, a.trans_qty, 0))'
                , 'issued' => 'sum(if(a.trans_code=2, a.trans_qty, 0))'                
                , 'saldo' => 'sum(if(a.trans_code=1, a.trans_qty, 0))-sum(if(a.trans_code=2, a.trans_qty, 0))'
                , 'item_name'
                , 'item_id'
                
            ])
            ->alias('a')
            ->with('item')            
            ->innerJoin('item as b', 'b.id = a.item_id')
            ->groupBy(['a.item_id', 'a.id', 'b.itemcode', 'b.item_name', 'a.item_id']);
        */
        /*-------------------------------------------------------------------------------*/

        $query = TransWh::find()->select([
            'itemcode'=>'b.itemcode'
            , 'b.item_name'
            , 'receive'=> 'sum(if(a.trans_code =1, a.trans_qty, 0))'
            , 'issued'=> 'sum(if(a.trans_code =2, a.trans_qty, 0))'
            , 'saldo'=>'sum(if (a.trans_code =1, a.trans_qty, -1*(a.trans_qty)))'

        ])->alias('a')
        ->innerJoin('item as b', 'b.id=a.item_id')
        ->groupBy(['a.item_id']);

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
            
        ]);

        $query
           
            ->andFilterWhere(['like', 'a.item_id', $this->itemcode])
            ->andFilterWhere(['like', 'b.item_name', $this->item_name]);
        
        return $dataProvider;
    }
}
