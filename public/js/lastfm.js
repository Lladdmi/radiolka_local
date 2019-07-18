function findAuthor() {
    let title = document.querySelector('#title').value;
    let author = document.querySelector('#author').value;
    // console.log(author);
    $.getJSON("http://ws.audioscrobbler.com/2.0/?method=artist.search&artist=" + author + "&api_key=ba486f0bef178e8399bf1e6982b5df82&format=json", function(data) {
        let items_a = [];
        for (let i = 0; i < (data['results']['artistmatches']['artist']).length; i++) {
            items_a.push(data['results']['artistmatches']['artist'][i]['name']);
        }
        // console.log(JSON.stringify(items_a));
        autocomplete(document.getElementById("author"), items_a);
    });
}

function findTitle() {
    let title = document.querySelector('#title').value;
    let author = document.querySelector('#author').value;
    // console.log(title);
    $.getJSON("http://ws.audioscrobbler.com/2.0/?method=track.search&track=" + title + "&artist=" + author + "&api_key=ba486f0bef178e8399bf1e6982b5df82&format=json", function(data) {
        let items = [];
        for (let i = 0; i < (data['results']['trackmatches']['track']).length; i++) {
            items.push(data['results']['trackmatches']['track'][i]['name']);
        }
        // console.log(JSON.stringify(items));
        autocomplete(document.getElementById("title"), items);
    });
}

function findInfo() {
    let title = document.querySelector('#title').value;
    let author = document.querySelector('#author').value;
    $.getJSON("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&track=" + title + "&artist=" + author + "&api_key=ba486f0bef178e8399bf1e6982b5df82&format=json", function(data) {
        if (typeof(data['track']['album']) !== 'undefined') {
            if (typeof(data['track']['album']['image']['2']['#text']) !== 'undefined') {
                let album = data['track']['album']['title'];
                let image = data['track']['album']['image']['2']['#text'];
                if (document.querySelector('#preview_album').dataset.status == '1') {
                    document.querySelector('input[name="album"]').value = document.querySelector('#preview_album').value;
                } else {
                    document.querySelector('input[name="album"]').value = album;
                }
                if (document.querySelector('#preview_image').dataset.status == '1') {
                    document.querySelector('input[name="image"]').value = document.querySelector('#preview_image').src + ".png";
                } else {
                    document.querySelector('input[name="image"]').value = image;
                }
                document.querySelector('#title').value = document.querySelector('#preview_title').value;
                document.querySelector('#submit').submit();
            } else {
                let album = data['track']['album']['title'];
                document.querySelector('input[name="album"]').value = album;
                document.querySelector('#title').value = document.querySelector('#preview_title').value;
                document.querySelector('#submit').submit();
            }
        } else {
          document.querySelector('#title').value = document.querySelector('#preview_title').value;
            document.querySelector('#submit').submit();
        }
    });
}

document.addEventListener("DOMContentLoaded", function(event) {
    let title = document.querySelector('#title');
    let author = document.querySelector('#author');
    title.value = '';
    author.value = ''
    title.disabled = true;

    author.addEventListener("input", function() {
        if (this.value.length == 0) {
            title.disabled = true;
        } else {
            title.disabled = false;
        }
    });
});
