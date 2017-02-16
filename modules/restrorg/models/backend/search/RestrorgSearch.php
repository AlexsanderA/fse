<?php

namespace app\modules\restrorg\models\backend\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\restrorg\models\backend\Restrorg;

/**
 * PostSearch represents the model behind the search form about `app\modules\admin\models\Post`.
 */
class RestrorgSearch extends Restrorg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at','status'], 'integer'],
            [['name', 'type_work','slug', 'adress', 'phone', 'mail','site'], 'safe'],
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
        $query = Restrorg::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['updated_at'=>3]]
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'adress', $this->adress]);
          //  ->andFilterWhere(['like', 'slug', $this->slug])
           // ->andFilterWhere(['like', 'keywords', $this->keywords])
           // ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
