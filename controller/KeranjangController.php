<?php

require_once __DIR__ . '/../models/Keranjang.php';

class KeranjangController
{
    public static function index()
    {
        try {
            $data = Keranjang::get();
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(['data' => $data]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function find($id)
    {
        try {
            $data = Keranjang::find($id);
            if (!$data) {
                http_response_code(404);
                echo json_encode(['error' => 'Data not found']);
                return;
            }
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(['data' => $data]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function create()
    {
        try {
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
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function update($id)
    {
        try {
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

            $updated = Keranjang::update($id, $data);

            if (!$updated) {
                http_response_code(404);
                echo json_encode(['error' => 'Data not found']);
                return;
            }

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(['data' => $updated]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function destroy($id)
    {
        try {
            $result = Keranjang::find($id);

            if (!$result) {
                http_response_code(404);
                echo json_encode(['error' => 'Data not found']);
                return;
            }
            Keranjang::delete($id);

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => [
                    'deleted' => true,
                    'datas' => $result
                ]
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    private static function error($e)
    {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => $e->getMessage()
        ]);
    }
}
