function getMetadata() {
    const fileInput = document.getElementById('audioFile');
    const file = fileInput.files[0];

    if (file) {
        uploadFile(file);
    }
}

function uploadFile(file) {
    const formData = new FormData();
    formData.append('audioFile', file);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(metadata => {
        displayMetadata(metadata.key, metadata.bpm);
    })
    .catch(error => console.error('Error:', error));
}

function displayMetadata(key, bpm) {
    const resultDiv = document.getElementById('metadataResult');
    resultDiv.innerHTML = `<p>Key: ${key}</p><p>BPM: ${bpm}</p>`;
}
