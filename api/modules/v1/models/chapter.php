<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property int $id
 * @property string $title_en
 * @property string $title_ar
 * @property string $title_ur
 * @property string $title_fa
 * @property string $munajaat
 * @property string $audio_link
 * @property int $status
 * @property string $created_on
 * @property int $created_by
 *
 * @property User $createdBy
 * @property Verse[] $verses
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
    * @inheritdoc
    */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_en', 'title_ar'], 'required'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerses()
    {
        return $this->hasMany(Verse::className(), ['chapter_id' => 'id']);
    }
}
