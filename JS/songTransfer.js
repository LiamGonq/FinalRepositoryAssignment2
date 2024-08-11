Query = String(document.getElementById("SearchBar").value);
CanGo = false;
songBox = document.getElementsByClassName("available");

function BackCol(BackColS, Hover){
    if(Hover) {
        BackColS.style.backgroundColor = "rgba(255, 239, 94, 0.709)";
    } else {
        BackColS.style.backgroundColor = "rgba(255, 219, 74, 0.709)";
    }
}

function like(newLikeSong) {
    if (newLikeSong.used != 1) {
        let likedSong = newLikeSong.cloneNode(true);
        likedSong.clone = true;
        let tempOld = newLikeSong;
        tempOld.used = 1;
        document.getElementById("userSongs").appendChild(likedSong);
        likedSong.addEventListener("click", () => {
            unlike(likedSong, tempOld);
        });
        likedSong.addEventListener("mouseover", () => {
            BackCol(likedSong, true);
        });
        likedSong.addEventListener("mouseout", () => {
            BackCol(likedSong, false);
        });
        likedSong.style.backgroundColor = "rgba(255, 219, 74, 0.709)";
    }
}

function unlike(unlikedSong, oldSong) {
    unlikedSong.remove();
    oldSong.used = 0;
}

for (let i = 0; i < songBox.length; i++) {
    songBox[i].addEventListener("click", () => {
        like(songBox[i]);
    });

    songBox[i].addEventListener("mouseover", () => {
        BackCol(songBox[i], true);
    });

    songBox[i].addEventListener("mouseout", () => {
        BackCol(songBox[i], false);
    });
}

function CanGoAll (theSong) {
    CanGo = false;
    if (theSong.children[0].innerHTML.includes(Query) || theSong.children[1].innerHTML.includes(Query) || theSong.children[2].innerHTML.includes(Query)) {
        CanGo = true;
    }
    return CanGo;
}

function CanGoTitle (theSong) {
    CanGo = false;
    if (theSong.children[0].innerHTML.includes(Query)) {
        CanGo = true;
    }
    return CanGo;
}

function CanGoArtist (theSong) {
    CanGo = false;
    if (theSong.children[1].innerHTML.includes(Query)) {
        CanGo = true;
    }
    return CanGo;
}

function CanGoGenre (theSong) {
    CanGo = false;
    if (theSong.children[2].innerHTML.includes(Query)) {
        CanGo = true;
    }
    return CanGo;
}

function Searched(searchSong) {
    if (document.getElementById("SearchCriteria").value == "General") {
        if(CanGoAll(searchSong)) {
            return true;
        }else{
            return false;
        }
    } else if (document.getElementById("SearchCriteria").value == "Title") {
        if(CanGoTitle(searchSong)) {
            return true;
        }else{
            return false;
        }
    } else if (document.getElementById("SearchCriteria").value == "Artist") {
        if(CanGoArtist(searchSong)) {
            return true;
        }else{
            return false;
        }
    } else if (document.getElementById("SearchCriteria").value == "Genre") {
        if(CanGoGenre(searchSong)) {
            return true;
        }else{
            return false;
        }
    }
}

function SearchActivate() {
    Query = String(document.getElementById("SearchBar").value);
    for (let i = 0; i < songBox.length; i++) {
        if (!songBox[i].clone) {
            songBox[i].style.display = "none";
            if (Searched(songBox[i])) {
                songBox[i].style.display = "block";
            }
        }
    }
}

document.getElementById("SearchBar").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("SearchButton").click();
    }
});