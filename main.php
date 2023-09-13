<?php
$url = "https://www.useragents.me/";
$html = file_get_contents($url);
$dom = new DOMDocument;
@$dom->loadHTML($html);
$textareaNodes = $dom->getElementsByTagName('textarea');
$userAgents = [];
foreach ($textareaNodes as $textarea) {
    if ($textarea->getAttribute('class') === 'form-control ua-textarea') {
        $userAgents[] = trim($textarea->nodeValue);
    }
}
file_put_contents('user_agents.txt', implode(PHP_EOL, $userAgents));
?>

