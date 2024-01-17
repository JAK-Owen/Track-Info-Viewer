<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSheet.css"> 
    <title>Track Info Viewer</title>
</head>
<body>

<input type="file" id="audioFile" accept=".mp3, .wav" />
<button onclick="getMetadata()">Get Metadata</button>
<div id="metadataResult"></div>

<script src="script.js"></script>

</body>
</html>
