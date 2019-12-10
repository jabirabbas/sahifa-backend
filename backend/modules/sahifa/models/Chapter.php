<?php

namespace app\modules\sahifa\models;

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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_en', 'title_ar', 'status',], 'required'],
            [['munajaat'], 'string'],
            [['status', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['title_en', 'title_ar', 'title_ur', 'title_fa', 'audio_link'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_en' => Yii::t('app', 'English Title'),
            'title_ar' => Yii::t('app', 'Arabic Title'),
            'title_ur' => Yii::t('app', 'Urdu Title'),
            'title_fa' => Yii::t('app', 'Farsi Title'),
            'munajaat' => Yii::t('app', 'Munajaat'),
            'audio_link' => Yii::t('app', 'Audio Link'),
            'status' => Yii::t('app', 'Status'),
            'created_on' => Yii::t('app', 'Created On'),
            'created_by' => Yii::t('app', 'Created By'),
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
