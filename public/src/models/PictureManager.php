<?php

class PictureManager
{
    public function getExtensionFromMimeType(string $mimeType): ?string
    {
        switch ($mimeType) {
            case 'image/jpeg':
                return 'jpeg';
            case 'image/jpg':
                return 'jpg';
            case 'image/png':
                return 'png';
            case 'image/gif':
                return 'gif';
            default:
                throw new RuntimeException('Unsupported mime type');
        }
    }
    public function isUploadSuccessful(array $uploadedFile)

    {
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $upload_dir = '../../public/src/img/uploads/';
        $acceptedType = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (isset($uploadedFile['error']) && $uploadedFile['error'] === UPLOAD_ERR_OK) {
            echo "no error".PHP_EOL;
            if ($fileSize < 7000000) {
                echo "size OK".PHP_EOL;
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->file($uploadedFile['tmp_name']);
                if (in_array($mimeType, $acceptedType)) {
                    echo "type OK".PHP_EOL;
                    if (move_uploaded_file($fileTmpPath,
                        $upload_dir.$_POST['pictureTitle'].'.'.$this->getExtensionFromMimeType($mimeType))) {
                        echo "Upload success";
                    } else {
                        echo "Erreur sur l'écriture :".$_FILES['uploadedFile']['error'];
                    }
                } else {
                    echo "Format de fichier non supporté";
                }
            } else {
                echo "Votre fichier est trop volumineux";
            }
        } else {
            echo "Erreur de l'upload";
        }
    }
    public function getUploadedFiles()
    {
        $dir = '../../public/src/img/uploads/';
        return array_slice(scandir($dir), 2);
    }
    public function getFirstPic()
    {
        return $this->getUploadedFiles()[0];
    }
    public function getRestPic()
    {
        return array_slice($this->getUploadedFiles(), 1);
    }
}
