<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adverts".
 *
 * @property int $advert_id
 * @property string $date_of_placement
 * @property string|null $date_of_update
 * @property string|null $title
 * @property string|null $description
 * @property int|null $price
 * @property string|null $location
 * @property int $user_id
 * @property int|null $category_id
 * @property int|null $status
 *
 * @property Category $category //tableName categories
 * @property User $user //tableName users
 */
class Advert extends \yii\db\ActiveRecord
{

    public const SCENARIO_UPDATE = 'update';
//    Написать сценарий для cabinet/viewUpdate, редактирование выбранного объявления

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adverts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_placement', 'date_of_update'], 'safe'],
            [['description'], 'string'],
            [['title','description','price','location','category_id',], 'required'],
            [['price','user_id', 'category_id', 'status'], 'integer'],
            [['title', 'location'], 'string', 'max' => 150],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'category_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'advert_id' => 'ID объявления',
            'date_of_placement' => 'Дата размещения',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'location' => 'Локация',
            'user_id' => 'ID пользователя',
            'category_id' => 'ID категории',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
