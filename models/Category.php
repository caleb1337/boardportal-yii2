<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $category_id
 * @property int|null $parent_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $key_words
 * @property string $alias
 *
 * * @property Advert[] $adverts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title', 'description', 'key_words', 'alias'], 'string'],
            [['alias'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'ID категории',
            'parent_id' => 'Родительская категория',
            'title' => 'Название',
            'description' => 'Описание',
            'key_words' => 'Ключи',
            'alias' => 'Алиас',
        ];
    }

    /**
     * Gets query for [[Adverts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::class, ['category_id' => 'category_id']);
    }
}
