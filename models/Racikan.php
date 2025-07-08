<?php

class Racikan
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
        $stmt = $db->query("SELECT * FROM racikan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM racikan WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = self::connect();
        $stmt = $db->prepare("INSERT INTO racikan (nama) VALUES (:nama)");
        $stmt->execute($data);
        $data['id'] = $db->lastInsertId();
        return $data;
    }

    public static function update($id, $data)
    {
        $db = self::connect();
        $data['id'] = $id;
        $stmt = $db->prepare("UPDATE racikan SET nama = :nama WHERE id = :id");
        $stmt->execute($data);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM racikan WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}
