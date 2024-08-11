<?php
        require_once('../PHP/songDAO.php'); 
        require_once('../PHP/song.php');

        function makeSongs () {
            $fullSongList = "";
            $songDAO = new songDAO();
            foreach ($songDAO->getSongs() as $i) {
                $title = $i->getName();
                $artist = $i->getArtist();
                $genre = $i->getGenre();
                $fullSongList .= 
                "<div class='available song' Title='$title' Artist='$artist' Genre='$genre'>
                    <p class='Title'>$title</p>
                    <p class='Artist'>$artist</p>
                    <p class='Genre'>$genre</p>
                </div>";
            }
            return $fullSongList;
        }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta name="author" content="Tyus Irvine, Liam Bernard, Ethan Bernard">
        <meta name="description" content="An online application for searching songs and creating a liked playlist">
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP, GitHub, Music, Songs, a liked Playlist">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <form>
            <select onchange = "OrderIt()" name="SearchCriteria" id="SearchCriteria">
                <option value="General">General</option>    
                <option value="Title">Title</option>
                <option value="Artist">Artist</option>
                <option value="Genre">Genre</option>
            </select>
        <input id="SearchBar" name="SearchedTerm" placeholder="Search for songs here" class = "searchbar"></input>
            <img id="SearchButton" src="../images/search.png" onclick="SearchActivate()">
        </form>
        <span id="sectionTwo" class="sectionHeader">My Liked Songs</span>
        <div id="allSongs" class="songHolder">
            <?php
                echo makeSongs();
            ?>
        </div>
        <div id="userSongs" class="songHolder">
            
        </div>
    </body>
</html>

<script src="../JS/songTransfer.js"></script>