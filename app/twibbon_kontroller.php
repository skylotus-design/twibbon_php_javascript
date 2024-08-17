<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    define('db', 'docs_github');

    class Database {
        public function __construct()
        {
            $db = new mysqli(host, user, pass, db);
            $this->db = $db;
            if(!$db){die("koneksi ancur");}
        }
    }

    class TwibbonKontroller extends Database {
        public function __construct()
        {
            $koneksi = new Database();
            $this->koneksi = $koneksi->db;
        }

        public function uploadTwibbon($par)
        {
            $sql = $this->koneksi->prepare("INSERT INTO twibbon(gambar_twibbon) VALUES(?)");
            $sql->bind_param('s', $par);
            $sql->execute();
            return True;
        }

        public function allTwibbon()
        {
            $sql = $this->koneksi->prepare("SELECT * FROM twibbon");
            $sql->execute();
            $query = $sql->get_result();
            return $query;
        }

        public function uploadGambar($idtwibbon)
        {
            $sql = $this->koneksi->prepare("SELECT * FROM twibbon WHERE id_twibbon = ?");
            $sql->bind_param('i', $idtwibbon);
            $sql->execute();
            $query = $sql->get_result();
            return $query;
        }

        public function hapusTwibbon($idtwibbon){
            $sql = $this->koneksi->prepare("DELETE FROM twibbon WHERE id_twibbon = ?");
            $sql->bind_param('i', $idtwibbon);
            $sql->execute();
            return True;
        }
    }
?>
