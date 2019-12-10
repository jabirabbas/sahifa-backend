<?php

namespace app\modules\sahifa\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sahifa\models\Chapter;

/**
 * ChapterSearch represents the model behind the search form of `app\modules\sahifa\models\Chapter`.
 */
class ChapterSearch extends Chapter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by'], 'integer'],
            [['title_en', 'title_ar', 'title_ur', 'title_fa', 'munajaat', 'audio_link', 'created_on'], 'safe'],
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
        $query = Chapter::find();

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
            'status' => $this->status,
            'created_on' => $this->created_on,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'title_ar', $this->title_ar])
            ->andFilterWhere(['like', 'title_ur', $this->title_ur])
            ->andFilterWhere(['like', 'title_fa', $this->title_fa])
            ->andFilterWhere(['like', 'munajaat', $this->munajaat])
            ->andFilterWhere(['like', 'audio_link', $this->audio_link]);

        return $dataProvider;
    }
}
