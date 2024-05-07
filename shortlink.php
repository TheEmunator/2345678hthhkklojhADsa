<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $youtubeVideoID = "dQw4w9WgXcQ"; // Replace VIDEO_ID with the actual video ID (ID = everything after "watch?v=")
    $isMobile = isMobile(); // Function for checking whether it is a mobile device
    $youtubeAppURL = "https://www.youtube.com/watch?v=" . $youtubeVideoID;

    if ($isMobile) {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($userAgent, 'iPhone') !== false || strpos($userAgent, 'iPad') !== false) {
            // iOS
            $youtubeAppURL = "youtube://watch?v=" . $youtubeVideoID;
        } else if (strpos($userAgent, 'Android') !== false) {
            // Android
            $youtubeAppURL = "vnd.youtube://" . $youtubeVideoID;

        }
    }

    header("Location: $youtubeAppURL");
    exit;
}

function isMobile() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobilePatterns = '/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i';
    return preg_match($mobilePatterns, $userAgent);
}
?>
