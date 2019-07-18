function autocomplete(inp, arr) {
    let currentFocus;
    inp.addEventListener("input", function(e) {
        let a, b, i, val = this.value;
        closeAllLists();
        if (!val) {
            return false;
        }
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        for (i = 0; i < 10; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i].replace(/'/g, "&#39;") + "'>";
                // console.log(arr[i]);
                b.addEventListener("click", function(e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                if (document.querySelector('#title').value.length !== 0) {
                    b.addEventListener('mouseover', function(e) {
                        let author = document.querySelector('#author').value;
                        let title = this.getElementsByTagName("input")[0].value;
                        document.querySelector('#preview_author').value = author;
                        document.querySelector('#preview_author').dataset.status = "1";
                        document.querySelector('#preview_title').value = title;
                        document.querySelector('#preview_title').dataset.status = "1";
                        $.getJSON("http://ws.audioscrobbler.com/2.0/?method=track.getInfo&track=" + title + "&artist=" + author + "&api_key=ba486f0bef178e8399bf1e6982b5df82&format=json", function(data) {
                            if (typeof(data['track']['album']) !== 'undefined') {
                                if (typeof(data['track']['album']['title']) !== 'undefined') {
                                    document.querySelector('#preview_album').value = data['track']['album']['title'];
                                    if (typeof(data['track']['album']['image']['2']['#text']) !== 'undefined') {
                                        document.querySelector('#preview_image').src = data['track']['album']['image']['2']['#text'];
                                        document.querySelector('#preview_image').dataset.status = "1";
                                    } else {
                                        document.querySelector('#preview_image').src = (document.querySelector('#default_album').src + ".png");
                                    }
                                    document.querySelector('#preview_album').value = data['track']['album']['title'];
                                    document.querySelector('#preview_album').dataset.status = "1";
                                } else {
                                    document.querySelector('#preview_album').value = "Album";
                                    document.querySelector('#preview_album').dataset.status = "0";
                                    if ((typeof(data['track']['album']['image']['2']['#text']) !== 'undefined') || (data['track']['album']['image']['2']['#text']) !== "") {
                                        document.querySelector('#preview_image').src = data['track']['album']['image']['2']['#text'];
                                    } else {
                                        document.querySelector('#preview_image').src = (document.querySelector('#default_album').src + ".png");
                                        document.querySelector('#preview_image').dataset.status = "0";
                                    }
                                }
                            } else {
                                document.querySelector('#preview_image').src = (document.querySelector('#default_album').src + ".png");
                                document.querySelector('#preview_image').dataset.status = "0";
                                document.querySelector('#preview_album').dataset.status = "0";
                                document.querySelector('#preview_album').value = "Album";
                            }
                        });

                    });
                }
                a.appendChild(b);
            }
        }
    });

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        let x = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}
