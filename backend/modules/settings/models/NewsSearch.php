<?php

namespace backend\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\News;

/**
 * NewsSearch represents the model behind the search form about `backend\modules\settings\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'group', 'date', 'description', 'activity'], 'safe'],
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
        $query = News::find();

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

        $query->joinWith('groups');

        // grid filtering conditions
        $query->andFilterWhere([
            'news.id' => $this->id,
            'news.date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'news.name', $this->name])
            ->andFilterWhere(['like', 'news.description', $this->description])
            ->andFilterWhere(['like', 'news.activity', $this->activity])
            ->andFilterWhere(['like', 'groups.name', $this->group]);

        return $dataProvider;
    }
}
