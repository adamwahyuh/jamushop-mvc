<?php


require_once __DIR__ . '/../models/Keranjang.php';

class KeranjangController
{
    public static function index()
    {
        $data = Keranjang::get();
        header('Content-Type: application/json');
        echo json_encode(['data' => $data]);
    }

    public static function find($id)
    {
        $data = Keranjang::find($id);
        if (!$data) {
            http_response_code(404);
            echo json_encode(['error' => 'Data not found']);
            return;
        }
        header('Content-Type: application/json');
        echo json_encode(['data' => $data]);
    }

    public static function create()
    {
        $payload = json_decode(file_get_contents('php://input'), true);

        if (!isset($payload['bahan_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'bahan_id is required']);
            return;
        }

        $data = [
            'bahan_id' => $payload['bahan_id'],
            'porsi' => $payload['porsi'] ?? 1
        ];

        $result = Keranjang::create($data);

        http_response_code(201);
        header('Content-Type: application/json');
        echo json_encode(['data' => $result]);
    }

    public static function update($id)
    {
        $payload = json_decode(file_get_contents('php://input'), true);

        $data = [
            'bahan_id' => $payload['bahan_id'] ?? null,
            'porsi' => $payload['porsi'] ?? null,
        ];

        if (empty($data['bahan_id']) || empty($data['porsi'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Data tidak lengkap']);
            return;
        }

        $success = Keranjang::update($id, $data);

        if (!$success) {
            http_response_code(404);
            echo json_encode(['error' => 'Data not found']);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode(['data' => ['updated' => true]]);
    }

    public static function destroy($id)
    {
        $success = Keranjang::delete($id);

        if (!$success) {
            http_response_code(404);
            echo json_encode(['error' => 'Data not found']);
            return;
        }

        header('Content-Type: application/json');
        echo json_encode(['data' => ['deleted' => true]]);
    }
}
