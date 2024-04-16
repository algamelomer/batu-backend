<?php

function GetTypeFile($file)
{
    if (!file_exists($file)) {
        return null;
    }

    $fileExtension = strtolower(pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION));
    if (empty($fileExtension)) {
        return 'File has no extension';
    }

    switch ($fileExtension) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'svg':
            return 'image';
        case 'mp4':
            return 'video';
        case 'mp3':
            return 'audio';
        case 'pdf':
            return 'pdf';
        case 'doc':
        case 'docx':
            return 'word';
        case 'txt':
            return 'text';
        case 'xls':
        case 'xlsx':
            return 'excel';
        default:
            return null;
    }
}

