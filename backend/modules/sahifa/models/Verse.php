<?php

namespace app\modules\sahifa\models;

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
            [['chapter_id', 'verse_no', 'verse_en', 'word_count'], 'required'],
            [['chapter_id', 'verse_no', 'word_count'], 'integer'],
            [['verse_en', 'verse_ar', 'verse_ur', 'verse_fa', 'verse_hi'], 'string'],
            [['chapter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['chapter_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'chapter_id' => Yii::t('app', 'Chapter'),
            'verse_no' => Yii::t('app', 'Verse No'),
            'verse_en' => Yii::t('app', 'Verse En'),
            'verse_ar' => Yii::t('app', 'Verse Ar'),
            'verse_ur' => Yii::t('app', 'Verse Ur'),
            'verse_fa' => Yii::t('app', 'Verse Fa'),
            'verse_hi' => Yii::t('app', 'Verse Hi'),
            'word_count' => Yii::t('app', 'Word Count'),
        ];
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
