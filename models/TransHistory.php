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
class TransHistory extends TransWh
{
    /**
     * @inheritdoc
     */
    public $receive;
    
    public function rules()
    {
        return [
            [['id', 'trans_code', 'trans_qty', 'item_id', 'projectsub_id', 'pr_number'], 'integer'],           
            [
                [
                    'project_number',
                    'date_create', 
                    'po_number', 
                    'location', 
                    'name_user_take', 
                    'from_to', 
                    'grpo_number', 
                    'item_name', 
                    'itemcode'
                ], 'safe'
            ],
            [['projectsub_dscription', 'project_dscription'],'string'],
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
        SELECT b.itemcode, b.item_name, d.project_number, d.project_dscription
        , a.id
        , a.date_create
        
        , if(a.trans_code=1, a.trans_qty, 0) as t_in
        , if(a.trans_code=2, a.trans_qty, 0) as t_out
        
        , a.po_number
        , a.location
        , a.name_user_take
        , a.from_to
        , a.grpo_number
        , a.item_id
        , a.projectsub_id
        , a.pr_number 
        FROM stocksap.trans_wh a
        JOIN item b ON (b.id = a.item_id)
        JOIN projectsub c on (c.id = a.projectsub_id)
        JOIN project d on (d.id = c.project_id)
        WHERE a.projectsub_id= 544
        AND a.date_create between '2017-04-01' AND '2017-04-30'
        */
        /*-------------------------------------------------------------------------------*/

        $query = TransWh::find()->select([
            'itemcode'=>'b.itemcode'            
            , 'b.item_name'
            , 'd.project_number'
            , 'd.project_dscription'
            , 'a.date_create'
            , 'receive'=> 'if(a.trans_code =1, a.trans_qty, 0)'
            , 'issued'=> 'if(a.trans_code =2, a.trans_qty, 0)'
            //, 'saldo'=>'sum(if (a.trans_code =1, a.trans_qty, -1*(a.trans_qty)))'
            ,'a.po_number'
            ,'a.location'
            , 'a.name_user_take'
            , 'a.from_to'
            , 'a.grpo_number'
            , 'a.item_id'
            //, 'a.projectsub_id'
            , 'a.pr_number' 
        ])->alias('a')
        ->innerJoin('item as b', 'b.id=a.item_id')
        ->innerJoin('projectsub as c', 'c.id= a.projectsub_id')
        ->innerJoin('project as d', 'd.id=c.project_id' );
        //->groupBy(['a.item_id']);

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
           
            ->andFilterWhere(['like', 'b.itemcode', $this->itemcode])
            ->andFilterWhere(['like', 'b.item_name', $this->item_name])
            ->andFilterWhere(['like', 'd.project_number', $this->project_number])
            ->andFilterWhere(['like', 'd.project_dscription', $this->project_dscription]);
        return $dataProvider;
    }
}
