<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransWh;

use app\models\Projectsub;

/**
 * TransWhSearch represents the model behind the search form of `app\models\TransWh`.
 */
class TransWhSearch extends TransWh
{
    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['id', 'trans_code', 'trans_qty', 'item_id', 'projectsub_id'], 'integer'],           
            [['date_create', 'po_number', 'location', 
                'name_user_take', 'from_to', 'grpo_number', 'itemcode', 'item_name', 'projectsub_number_id'], 'safe'],
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
        $query = TransWh::find()
            ->select(['a.*', 'c.item_name', 'c.itemcode', 'b.projectsub_number_id'])
            ->alias('a')
            ->with('projectsub', 'item')
            ->innerJoin('projectsub as b', 'b.id = a.projectsub_id')
            ->innerJoin('item as c', 'c.id = a.item_id');

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
            'id' => $this->id,
            'date_create' => $this->date_create,
            'trans_code' => $this->trans_code,
            'trans_qty' => $this->trans_qty,
            'item_id' => $this->item_id,
            'projectsub_id' => $this->projectsub_id,
        ]);

        $query->andFilterWhere(['like', 'po_number', $this->po_number])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name_user_take', $this->name_user_take])
            ->andFilterWhere(['like', 'from_to', $this->from_to])
            ->andFilterWhere(['like', 'grpo_number', $this->grpo_number])
            ->andFilterWhere(['like', 'projectsub_dscription', $this->projectsub_dscription])
            ->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'itemcode', $this->itemcode])
            ->andFilterWhere(['like', 'projectsub_number_id', $this->projectsub_number_id]);

        return $dataProvider;
    }
}
