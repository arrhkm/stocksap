<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projectsub;

/**
 * ProjectsubSearch represents the model behind the search form of `app\models\Projectsub`.
 */
class ProjectsubSearch extends Projectsub
{
    /**
     * @inheritdoc
     */
    public $project_number;
    public function rules()
    {
        return [
            [['id', 'projectsub_number', 'project_id'], 'integer'],
            [['projectsub_dscription', 'project_dscription', 'project_number', 'projectsub_number_id'], 'safe'],
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
        $query = Projectsub::find()->from('projectsub as a')
                ->innerJoin('project as b', 'b.id = a.project_id');

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
            'projectsub_number' => $this->projectsub_number,
            'project_id' => $this->project_id,
            
        ]);

        $query->andFilterWhere(['like', 'projectsub_dscription', $this->projectsub_dscription])
                ->andFilterWhere(['like', 'b.project_number', $this->project_number])
                ->andFilterWhere(['like', 'projectsub_number_id', $this->projectsub_number_id]);

        return $dataProvider;
    }
}
