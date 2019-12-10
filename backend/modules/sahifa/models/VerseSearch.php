<?php

namespace app\modules\sahifa\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sahifa\models\Verse;

/**
 * VerseSearch represents the model behind the search form of `app\modules\sahifa\models\Verse`.
 */
class VerseSearch extends Verse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chapter_id', 'verse_no', 'word_count'], 'integer'],
            [['verse_en', 'verse_ar', 'verse_ur', 'verse_fa', 'verse_hi'], 'safe'],
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
        $query = Verse::find();

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
            'chapter_id' => $this->chapter_id,
            'verse_no' => $this->verse_no,
            'word_count' => $this->word_count,
        ]);

        $query->andFilterWhere(['like', 'verse_en', $this->verse_en])
            ->andFilterWhere(['like', 'verse_ar', $this->verse_ar])
            ->andFilterWhere(['like', 'verse_ur', $this->verse_ur])
            ->andFilterWhere(['like', 'verse_fa', $this->verse_fa])
            ->andFilterWhere(['like', 'verse_hi', $this->verse_hi]);

        return $dataProvider;
    }
}
