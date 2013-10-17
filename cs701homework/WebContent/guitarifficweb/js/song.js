/*
 * author: Ryszard Kilarski
 * email: emrys@bu.edu
 * BUI ID: U81-39-8560
 *
 *This is the song object; it contains the song information.
 */

/**
 * Constructor for the Song object.
 * lyrics = [lines]  	
 * 	line = {
 * 			text : "text",
 * 			type : "lyric/label/chord"
 * 		}
 * 
 * chords = [GuitarChart]
 */
function Song(songName, artistName, lyrics, chords) {
	this.songName = songName;
	this.artistName = artistName;
	this.lyrics = lyrics;
	this.chords = chords;

	this.save = function() {

	}
}