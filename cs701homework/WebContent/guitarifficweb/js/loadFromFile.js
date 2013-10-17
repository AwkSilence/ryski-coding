/*
 * author: Ryszard Kilarski
 * email: emrys@bu.edu
 * BUI ID: U81-39-8560
 *
 *This set of functions loads the chords from an XML file.
 */

/**
 * XMLHttpRequest - asynchronous loading of XML data
 * 
 * @param url
 */
function loadChordsFromXMLFile(url, fetchChords) {
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}
	if (xhr) {
		xhr.onreadystatechange = function() {
			loadXMLData(fetchChords);
		};
		xhr.open('GET', url, true);
		xhr.send(null);
	}
}
/**
 * Callback function when data is loaded
 */
function loadXMLData(fetchChords) {
	if (xhr.readyState == 4) {
		if (xhr.status == 200) {
			openDatabase(function() {
				performLoad(fetchChords);
			});
		} else {
			// showMessage('Unsuccessful in loading from file.');
		}
	}
}

function performLoad(fetchChords) {
	var chords = xhr.responseXML.getElementsByTagName('chord');
	for ( var i = 0; i < chords.length; i++) {
		var chordName = chords[i].getElementsByTagName('chordName')[0].textContent;
		var chordPosition = chords[i].getElementsByTagName('chordPosition')[0].textContent;
		var chordFingering = chords[i].getElementsByTagName('chordFingering')[0].textContent;
		var chordFrets = chords[i].getElementsByTagName('chordFrets')[0].textContent;
		var isLeftHanded = chords[i].getElementsByTagName('isLeftHanded')[0].textContent;

		// create a new JSON object for each song
		var chord = new GuitarChart(chordName, chordPosition, chordFingering,
				chordFrets, isLeftHanded);
		chord.id = i + 1;
		// We can't file this function into the database, so remove it.
		delete chord.getCanvas;
		addChordDB(chord);
	}
	fetchChords();
}