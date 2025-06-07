<?php
function uploadImage($img, $img_name, $location) {
    $target = PUBROOT.$location.$img_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($img, $target);
}

function updateImage($old, $img, $img_name, $location) {
    unlink($old);

    $target = PUBROOT.$location.$img_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($img, $target);
}

function uploadDocument($document, $document_name, $location) {
    $target = PUBROOT.$location.$document_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($document, $target);
}

function updateDocument($old1, $document, $document_name, $location) {
    unlink($old1);

    $target = PUBROOT.$location.$document_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($document, $target);
}

/*function uploadImage($img, $img_name, $location) {
    $target = PUBROOT.$location.$img_name;

    return move_uploaded_file($img, $target);
}

function updateImage($old, $img, $img_name, $location) {
    unlink($old);

    $target = PUBROOT.$location.$img_name;

    return move_uploaded_file($img, $target);
} */

function deleteImage($img)
{
    if(unlink($img)) {
        return true;
    } else {
        return false;
    }
}

function deleteDocument($document)
{
    if(unlink($document)) {
        return true;
    } else {
        return false;
    }
}

