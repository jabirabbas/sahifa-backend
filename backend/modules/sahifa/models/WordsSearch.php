<?php

namespace app\modules\sahifa\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sahifa\models\Words;

/**
 * WordsSearch represents the model behind the search form of `app\modules\sahifa\models\Words`.
 */
class WordsSearch extends Words
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'verse_id', 'word_sequence'], 'integer'],
            [['word_en', 'word_ar', 'word_ur', 'word_fa', 'word_hi'], 'safe'],
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
        $query = Words::find();

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
            'verse_id' => $this->verse_id,
            'word_sequence' => $this->word_sequence,
        ]);

        $query->andFilterWhere(['like', 'word_en', $this->word_en])
            ->andFilterWhere(['like', 'word_ar', $this->word_ar])
            ->andFilterWhere(['like', 'word_ur', $this->word_ur])
            ->andFilterWhere(['like', 'word_fa', $this->word_fa])
            ->andFilterWhere(['like', 'word_hi', $this->word_hi]);

        return $dataProvider;
    }
}
