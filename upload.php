<?php

// Include getID3 library
require '/Applications/XAMPP/xamppfiles/htdocs/TRACK-INFO-VIEWER/getid3/getid3.php';

if ($_FILES["audioFile"]["error"] == 0) {
    $tempFilePath = $_FILES["audioFile"]["tmp_name"];

    // Use getID3 to parse metadata
    $metadata = parseMetadata($tempFilePath);

    echo json_encode($metadata);
} else {
    echo "Error: " . $_FILES["audioFile"]["error"];
}

function parseMetadata($filePath) {
    $getID3 = new getID3();

    try {
        $fileInfo = $getID3->analyze($filePath);

        // Extract key and BPM information
        $key = isset($fileInfo['tags']['id3v2']['key'][0]) ? $fileInfo['tags']['id3v2']['key'][0] : 'Unknown';
        $bpm = isset($fileInfo['tags']['id3v2']['bpm'][0]) ? $fileInfo['tags']['id3v2']['bpm'][0] : 0;

        return ['key' => $key, 'bpm' => $bpm];
    } catch (\Exception $e) {
        return ['key' => 'Unknown', 'bpm' => 0];
    }
}
?>
