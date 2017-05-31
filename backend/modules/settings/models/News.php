<?php

namespace backend\modules\settings\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property integer $group
 * @property string $activity
 *
 * @property Groups $group0
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'description', 'group', 'activity'], 'required'],
            [['date'], 'safe'],
            [['description', 'activity'], 'string'],
            [['group'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
            'description' => 'Description',
            'group' => 'Group',
            'activity' => 'Activity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group']);
    }

    public function getActivePosts()
    {
        $active_news = self::find()
            ->where(['activity' => 'active'])
            ->all();

        return $active_news;
    }

    public function getYearsOfPublishing(){
        $active_posts = self::getActivePosts();
        $year_arr = array();

        foreach ($active_posts as $active_post) {
            $date = $active_post->date;
            $year = date('Y', strtotime($date));
            $year_arr[] = $year;
        }

        return array_unique($year_arr);
    }
}
