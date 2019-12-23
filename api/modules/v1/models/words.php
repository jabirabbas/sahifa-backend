<?php

namespace api\modules\v1\models;

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
            [['verse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Verse::className(), 'targetAttribute' => ['verse_id' => 'id']],
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
