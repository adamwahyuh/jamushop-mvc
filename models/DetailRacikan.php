<?php

class DetailRacikan
{
    private static function connect()
    {
        $db = new PDO("sqlite:" . __DIR__ . "/../database/database.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function get()
    {
        $db = self::connect();
        $stmt = $db->query("SELECT * FROM detail_racikan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM detail_racikan WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = self::connect();
        $stmt = $db->prepare("INSERT INTO detail_racikan (bahan_id, racikan_id, porsi) VALUES (:bahan_id, :racikan_id, :porsi)");
        $stmt->execute($data);
        $data['id'] = $db->lastInsertId();
        return $data;
    }

    public static function update($id, $data)
    {
        $db = self::connect();
        $data['id'] = $id;
        $stmt = $db->prepare("UPDATE detail_racikan SET bahan_id = :bahan_id, racikan_id = :racikan_id, porsi = :porsi WHERE id = :id");
        $stmt->execute($data);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM detail_racikan WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }

    public static function findByRacikanId($racikan_id)
    {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM detail_racikan WHERE racikan_id = :racikan_id");
        $stmt->execute(['racikan_id' => $racikan_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function deleteByRacikanId($racikan_id)
    {
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM detail_racikan WHERE racikan_id = :racikan_id");
        $stmt->execute(['racikan_id' => $racikan_id]);
        return $stmt->rowCount() > 0;
    }


}
