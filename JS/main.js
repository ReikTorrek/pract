let currentSong = undefined;
let currentId = undefined;
let player = undefined;
$(document).ready(function () {
    player = new AudioController(document.getElementById('player'));
    player.addChangeListener((state, audio) => {
        switch (state) {
            case 0:

            case 1:

            case 2:

            case 3:

            case 4:

            case 5:

        }
    })
    /**
     * START   = 0<br>
     * PLAYING = 1<br>
     * PAUSED  = 2<br>
     * ENDED   = 3<br>
     * STOPPED = 4<br>
     * POSITION_CHANGED = 5<br>
     * @type {AudioController.PlaybackState}
     */
    const Enums = player.copyEnums();
    var data = document.querySelectorAll('.songInfo');
    /**
     *
     * @type {HTMLCollectionOf<Element>}
     */
    var link = document.getElementsByClassName('linkUrl');
    //console.log(data);
    var id_song, song, i, songs = [];
    for (const value of data) {
        let song = {
            id: undefined,
            link: undefined,
            name: undefined,
            duration: undefined
        }
        for (const childrenValue of value.children) {
            song[childrenValue.className] = childrenValue.getAttribute('data-attr');

        }
        //console.log(song);
        songs.push(song);
    }
    /**
     * @param value {HTMLElement}
     */
    for (const value of link){
        value.addEventListener('click', function (event) {
            player.play(value.getAttribute('data'));
        })
    }
    //Song = new Audio(songs[id-1][2]);
    //console.log(duration);
    //console.log(songs)
})
