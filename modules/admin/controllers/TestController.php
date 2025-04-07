<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $posts = Yii::$app->db->createCommand('SELECT * FROM test')->queryAll();
        return $this->render('index', [
            'posts' => $posts
        ]);
    }
    public function actionData()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = Yii::$app->request;

        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search = $request->get('search')['value'];
        $orderColumnIndex = $request->get('order')[0]['column'];
        $orderDirection = $request->get('order')[0]['dir'];

        // Kolom yang tersedia di tabel (harus sesuai urutan kolom table di DataTables)
        $columns = ['id', 'name', 'phone'];

        $orderColumn = $columns[$orderColumnIndex] ?? 'id';

        // SQL Filter
        $where = '';
        $params = [];

        if (!empty($search)) {
            $where = "WHERE name LIKE :search OR phone LIKE :search";
            $params[':search'] = '%' . $search . '%';
        }

        // Total records
        $totalQuery = Yii::$app->db->createCommand("SELECT COUNT(*) FROM test $where", $params);
        $recordsTotal = $totalQuery->queryScalar();
        $recordsFiltered = $recordsTotal;

        // Data query
        $sql = "SELECT id, name, phone FROM test $where ORDER BY $orderColumn $orderDirection LIMIT :start, :length";
        $params[':start'] = (int)$start;
        $params[':length'] = (int)$length;

        $data = Yii::$app->db->createCommand($sql, $params)->queryAll();

        // Format response
        $rows = [];
        foreach ($data as $row) {
            $rows[] = [
                $row['id'],
                $row['name'],
                $row['phone'],
                '<button class="btn btn-sm btn-primary updateBtn" data-id="'.$row['id'].'">Edit</button>
                <button class="btn btn-sm btn-danger deleteBtn" data-id="'.$row['id'].'">Delete</button>'
            ];
        }

        return [
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $rows,
        ];
    }

}