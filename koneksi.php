<?php
// File: config/Database.php

class Database {
    private $host = 'localhost';
    private $db_name = 'db_informasi_lowongan_kerja';
    private $username = 'root';
    private $password = '';
    private static $conn;

    public function connect() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name}",
                    $this->username,
                    $this->password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
