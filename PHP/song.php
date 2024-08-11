<?php
    class Song {
        private $song_id;
        private $song_name;
        private $artist;
        private $genre;

        function __construct($song_id, $song_name, $artist, $genre) {
            $this->setId($song_id);
            $this->setName($song_name);
            $this->setArtist($artist);
            $this->setGenre($genre);
        }

        public function getId() {
            return $this->song_id;
        }

        public function setId($song_id) {
            $this->song_id = $song_id;
        }

        public function getName() {
            return $this->song_name;
        }

        public function setName($song_name) {
            $this->song_name = $song_name;
        }

        public function getArtist() {
            return $this->artist;
        }

        public function setArtist($artist) {
            $this->artist = $artist;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function setGenre($genre) {
            $this->genre = $genre;
        }
    }
?>