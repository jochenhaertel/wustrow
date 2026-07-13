<?php
function listMediaFiles($dir) {
    $allowedImageExts = ['jpg', 'jpeg', 'png'];
    $allowedVideoExts = ['mp4', 'mov'];
    $media = [];

    // Recursive scan so every media file inside images/ ends up in the slideshow.
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $relPath = str_replace(__DIR__ . '/', '', $file->getPathname());
        $type = null;

        if (in_array($ext, $allowedImageExts)) {
            $type = 'image';
        } elseif (in_array($ext, $allowedVideoExts)) {
            $type = 'video';
        }

        if ($type) {
            $entry = [
                'type' => $type,
                'src' => $relPath,
                'caption' => basename($file),
            ];

            if ($type === 'image') {
                // EXIF/IPTC is only useful for still images, not for video files.
                $exif = @exif_read_data($file);
                $iptc = @iptcparse($file->getPathname());
                $keywords = [];

                if (!empty($exif['COMPUTED']['UserComment'])) {
                    $keywords = explode(',', $exif['COMPUTED']['UserComment']);
                }

                $subject = $iptc['2#025'][0] ?? '';
                if ($subject) {
                    $keywords[] = $subject;
                }

                $description = $exif['ImageDescription'] ?? '';
                if ($description) {
                    $keywords[] = $description;
                }

                $entry['exif'] = [
                    'datetime' => $exif['DateTimeOriginal'] ?? '',
                    'description' => $description,
                    'dc:subject' => $subject,
                    'keywords' => $keywords
                ];
            }

            $media[] = $entry;
        }
    }

    return $media;
}

$media = listMediaFiles(__DIR__ . '/images');

// Keep the slideshow order deterministic across requests.
usort($media, function($a, $b) {
    return strcmp($a['src'], $b['src']);
});

// Serve the media list as JSON for index.html.
header('Content-Type: application/json');
echo json_encode($media);
?>
