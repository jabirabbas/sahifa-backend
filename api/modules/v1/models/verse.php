<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "verse".
 *
 * @property int $id
 * @property int $chapter_id
 * @property int $verse_no
 * @property string $verse_en
 * @property string|null $verse_ar
 * @property string|null $verse_ur
 * @property string|null $verse_fa
 * @property string|null $verse_hi
 * @property int $word_count
 *
 * @property Chapter $chapter
 * @property Word[] $words
 */
class Verse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chapter_id', 'verse_no', 'verse_ar', 'word_count'], 'required'],
            [['chapter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['chapter_id' => 'id']],
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['id' => 'chapter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWords()
    {
        return $this->hasMany(Word::className(), ['verse_id' => 'id']);
    }
}
