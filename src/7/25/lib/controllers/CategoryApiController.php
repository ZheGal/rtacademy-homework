<?php

namespace lib\controllers;

class CategoryApiController extends CategoryController
{
    public function getList() : array
    {
        try {
            $model = new \lib\models\CategoriesModel();
            $categories = $model->getList();
            
            $response = [
                'status' => 200,
                'data' => []
            ];

            foreach ($categories as $category) {
                $response['data'][] = [
                    'id' => $category->getId(),
                    'title' => $category->getTitle(),
                    'alias' => $category->getAlias()
                ];
            }
            return $response;

        } catch ( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }

    public function getSingle( int $id ) : array
    {
        try {
            $model = new \lib\models\CategoriesModel();
            $single = $model->getSingle( $id );
            
            $response = (!empty($single)) ? [
                'status' => 200,
                'data' => [
                    'id' => $single->getId(),
                    'title' => $single->getTitle(),
                    'alias' => $single->getAlias()
                ]
            ] : [
                'status' => 404,
                'error' => 'Категорію не знайдено'
            ];
            return $response;
        } catch( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }

    public function create() : array
    {
        try {
            $model = new \lib\models\CategoriesModel();

            $title = $_POST['title'] ?? '';
            $alias = $_POST['alias'] ?? '';

            if (!$this->_validateTitle($title)) {
                $response = [
                    'status' => 411, 
                    'error' => 'Необхідно заповнити поле "Назва"'
                ];
            }

            if (!$this->_validateAlias($alias)) {
                $response = [
                    'status' => 412, 
                    'error' => 'Необхідно заповнити поле "Аліас"'
                ];
            }

            return [];

        } catch( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }

    public function update( int $id ) : array
    {
        try {
            $model = new \lib\models\CategoriesModel();
            $single = $model->getSingle( $id );

        } catch( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }

    public function delete( int $id ) : array
    {
        try {
            $model = new \lib\models\CategoriesModel();

        } catch( \Exception $e ) {
            return [
                'status' => 490,
                'error' => "Помилка БД: {$e->getMessage()}"
            ];
        }
    }
}