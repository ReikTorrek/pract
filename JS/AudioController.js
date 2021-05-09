/**
 * @class
 */
class AudioController {

    /**
     * START   = 0<br>
     * RESUMED = 1<br>
     * PAUSED  = 2<br>
     * ENDED   = 3<br>
     * STOPPED = 4<br>
     * POSITION_CHANGED = 5<br>
     * @type {Readonly<{PAUSED: number, STOPPED: number, START: number, ENDED: number, PLAYING: number}>}
     */
    PlaybackState = Object.freeze({
        START: 0,
        RESUMED: 1,
        PAUSED: 2,
        ENDED: 3,
        STOPPED: 4,
        POSITION_CHANGED: 5
    })

    /**
     *
     * @type {Audio|HTMLAudioElement|HTMLMediaElement}
     */
    #audio = undefined;
    #playing = undefined;

    #timeoutID = -1;

    /**
     *
     * @type {Array.<function(state: PlaybackState, audio: Audio|HTMLAudioElement|HTMLMediaElement)>}
     */
    #onPlaybackStateChangeArray = []

    #fireCallBack = (state, audio) => {
        this.#onPlaybackStateChangeArray.forEach(value => {
            value(state, audio);
        })
    }

    constructor(audio) {
        if (audio === undefined || audio === null) {
            throw new Error("Audio can't be null!");
        }
        this.#audio = audio;
        this.#audio.addEventListener('play', ev => {
            this.#playing = true;
            if (this.#timeoutID !== -1) {
                window.clearTimeout(this.#timeoutID);
            } else {
                if (this.#audio.currentTime === 0) {
                    this.#fireCallBack(this.PlaybackState.START, this.#audio);
                } else if (this.#audio.currentTime > 0) {
                    this.#fireCallBack(this.PlaybackState.RESUMED, this.#audio);
                }
            }
        })
        this.#audio.addEventListener('pause', ev => {
            this.#playing = false;
            this.#timeoutID = setTimeout(() => {
                if (this.#audio.currentTime === this.#audio.duration) {
                    this.#fireCallBack(this.PlaybackState.ENDED, this.#audio);
                } else {
                    this.#fireCallBack(this.PlaybackState.PAUSED, this.#audio);
                }
                this.#timeoutID = -1;
            }, 100)
        })
        this.#audio.addEventListener('seeked', ev => {
            this.#fireCallBack(this.PlaybackState.POSITION_CHANGED, this.#audio);
        })
    }

    isPlaying() {
        return !this.#audio.paused;
    }

    /**
     * Добавляет callback-функцию при изменении состояния проигрывания плеера.
     *
     * Коллбек возвращает {@link PlaybackState} и {@link Audio}
     * @param listener {function(state: PlaybackState, audio: Audio|HTMLAudioElement|HTMLMediaElement)}
     */
    addChangeListener(listener) {
        this.#onPlaybackStateChangeArray.push(listener);
    }


    play(link) {
        let newSong = false;
        if (!(link === null || link === undefined)) {
            this.#audio.src = link;
            newSong = true;
        }
        this.#audio.play();
    }

    pause() {
        this.#audio.pause();
        this.#fireCallBack(this.PlaybackState.PAUSED, this.#audio);
    }

    stop() {
        this.#audio.pause();
        this.#audio.currentTime = 0;
        this.#fireCallBack(this.PlaybackState.STOPPED, this.#audio);
    }

    /**
     *
     * @param time {number}
     */
    seek(time) {
        if (!(this.#audio.currentSrc === null || this.#audio.currentSrc === undefined)) {
            this.#audio.currentTime = time;
        }
    }

    copyEnums(){
        return this.PlaybackState;
    }

}