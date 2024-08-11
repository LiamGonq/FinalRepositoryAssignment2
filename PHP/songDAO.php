<?php
    require_once('abstractDAO.php');
    require_once('song.php');

    class songDAO extends abstractDAO{
        function __construct() {
            try{
                parent::__construct();
            } catch(mysqli_sql_exception $e){
                throw $e;
            }
        }

        public function getSongs() {
            $result = $this->mysqli->query('SELECT * FROM songs');
            $songs = Array();

            if($result->num_rows >= 1){
                while($row = $result->fetch_assoc()){
                    //Create a new employee object, and add it to the array.
                    $song = new Song($row['song_id'], $row['song_name'], $row['artist'], $row['genre']);
                    $songs[] = $song;
                }
                $result->free();
                return $songs;
            }
            else {
                $result->free();
                return false;
            }
        }

        public function getSongName($song_name){
            $query = 'SELECT * FROM songs WHERE song_name = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $song_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $song = new Song($temp['song_id'], $temp['song_name'], $temp['artist'], $temp['genre']);
                $result->free();
                return $song;
            }
            else {
                $result->free();
                return false;
            }
        }

        public function getSongArtist($artist){
            $query = 'SELECT * FROM songs WHERE artist = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $artist);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $song = new Song($temp['song_id'], $temp['song_name'], $temp['artist'], $temp['genre']);
                $result->free();
                return $song;
            }
            else {
                $result->free();
                return false;
            }
        }

        public function getSongGenre($genre){
            $query = 'SELECT * FROM songs WHERE genre = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('s', $genre);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
                $temp = $result->fetch_assoc();
                $song = new Song($temp['song_id'], $temp['song_name'], $temp['artist'], $temp['genre']);
                $result->free();
                return $song;
            }
            else {
                $result->free();
                return false;
            }
        }
    }

    // public function editSong($song_name){
    //     if(!$this->mysqli->connect_errno){
    //         $query = 'UPDATE songs SET liked = true WHERE song_id = ?';
    //         $stmt = $this->mysqli->prepare($query);
    //         $stmt->bind_param('bi', $liked, $song_id);
    //         $stmt->execute();
    //         if($stmt->error){
    //             return false;
    //         } 
    //         else {
    //             return $stmt->affected_rows;
    //         }
    //     } 
    //     else {
    //         return false;
    //     }
    // }
?>