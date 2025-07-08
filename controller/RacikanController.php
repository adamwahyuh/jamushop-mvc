<?php

require_once __DIR__ . '/../models/Racikan.php';
require_once __DIR__ . '/../models/DetailRacikan.php';

class RacikanController
{
    public static function index()
    {
        try {
            $racikans = Racikan::get();

            // tambahkan details untuk setiap racikan
            foreach ($racikans as &$racikan) {
                $racikan['details'] = DetailRacikan::findByRacikanId($racikan['id']);
            }

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(['data' => $racikans]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function find($id)
    {
        try {
            $racikan = Racikan::find($id);

            if (!$racikan) {
                http_response_code(404);
                echo json_encode(['error' => 'Racikan tidak ditemukan']);
                return;
            }

            $racikan['details'] = DetailRacikan::findByRacikanId($id);

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(['data' => $racikan]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function create()
    {
        try {
            $payload = json_decode(file_get_contents('php://input'), true);

            if (empty($payload['nama'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Nama racikan wajib diisi']);
                return;
            }

            $racikan = Racikan::create(['nama' => $payload['nama']]);

            $racikan_id = $racikan['id'];

            $details = [];

            if (!empty($payload['details'])) {
                foreach ($payload['details'] as $detail) {
                    if (!isset($detail['bahan_id'])) {
                        continue;
                    }
                    $detailData = [
                        'bahan_id' => $detail['bahan_id'],
                        'racikan_id' => $racikan_id,
                        'porsi' => $detail['porsi'] ?? 1
                    ];
                    $details[] = DetailRacikan::create($detailData);
                }
            }

            http_response_code(201);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => [
                    'racikan' => $racikan,
                    'details' => $details
                ]
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function update($id)
    {
        try {
            $payload = json_decode(file_get_contents('php://input'), true);

            if (empty($payload['nama'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Nama racikan wajib diisi']);
                return;
            }

            $racikan = Racikan::update($id, ['nama' => $payload['nama']]);

            // Hapus detail lama
            DetailRacikan::deleteByRacikanId($id);

            $details = [];

            if (!empty($payload['details'])) {
                foreach ($payload['details'] as $detail) {
                    if (!isset($detail['bahan_id'])) {
                        continue;
                    }
                    $detailData = [
                        'bahan_id' => $detail['bahan_id'],
                        'racikan_id' => $id,
                        'porsi' => $detail['porsi'] ?? 1
                    ];
                    $details[] = DetailRacikan::create($detailData);
                }
            }

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => [
                    'racikan' => $racikan,
                    'details' => $details
                ]
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function destroy($id)
    {
        try {
            $racikan = Racikan::find($id);

            if (!$racikan) {
                http_response_code(404);
                echo json_encode(['error' => 'Racikan tidak ditemukan']);
                return;
            }

            DetailRacikan::deleteByRacikanId($id);
            Racikan::delete($id);

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => [
                    'deleted' => true,
                    'racikan' => $racikan
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
