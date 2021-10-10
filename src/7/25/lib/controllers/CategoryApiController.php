<?php

namespace lib\controllers;

class CategoryApiController extends CategoryController
{
    public function getList() : array
    {
        try {
            $model = new \lib\models\CategoriesModel();
            $categories = $model->getList();
            return $categories;
        } catch ( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }

    public function getSingle( int $id ) : array
    {
        return [];
    }

    public function create() : array
    {
        print_r($_POST);
        return [];
    }

    public function update( int $id ) : array
    {
        return [];
    }

    public function delete( int $id ) : array
    {
        return [];
    }
}