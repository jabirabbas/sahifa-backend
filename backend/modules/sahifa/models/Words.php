<?php

namespace app\modules\sahifa\models;

use Yii;

/**
 * This is the model class for table "words".
 *
 * @property int $id
 * @property int $verse_id
 * @property int $word_sequence
 * @property string|null $word_en
 * @property string $word_ar
 * @property string|null $word_ur
 * @property string|null $word_fa
 * @property string|null $word_hi
 *
 * @property Verse $verse
 */
class Words extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'words';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['verse_id', 'word_sequence', 'word_ar'], 'required', 'message' => 'Required!'],
            [['verse_id', 'word_sequence'], 'integer'],
            [['word_en', 'word_ar', 'word_ur', 'word_fa', 'word_hi'], 'string', 'max' => 100],
            [['verse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Verse::className(), 'targetAttribute' => ['verse_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'verse_id' => Yii::t('app', 'Verse ID'),
            'word_sequence' => Yii::t('app', 'Word No.'),
            'word_en' => Yii::t('app', 'Word En'),
            'word_ar' => Yii::t('app', 'Word Ar'),
            'word_ur' => Yii::t('app', 'Word Ur'),
            'word_fa' => Yii::t('app', 'Word Fa'),
            'word_hi' => Yii::t('app', 'Word Hi'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerse()
    {
        return $this->hasOne(Verse::className(), ['id' => 'verse_id']);
    }
}
