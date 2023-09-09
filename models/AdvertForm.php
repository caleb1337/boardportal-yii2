<?php

namespace app\models;

class AdvertForm extends \yii\base\Model
{
    public $category_id;
    public $title;
    public $price;
    public $location;
    public $description;

    public function rules()
    {
        return [
                [['description'], 'string'],
                [['price', 'category_id',], 'integer'],
                [['title', 'location'], 'string', 'max' => 150],
                [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
                'date_of_placement' => 'Дата размещения',
                'title' => 'Название',
                'description' => 'Описание',
                'price' => 'Цена',
                'location' => 'Локация',
                'category_id' => 'ID категории',
        ];
    }
}