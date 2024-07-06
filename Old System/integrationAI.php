<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://chatgpt-42.p.rapidapi.com/conversationgpt4",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'messages' => [
                [
                                'role' => 'user',
                                'content' => 'hello'
                ]
        ],
        'system_prompt' => 'if you cant fit all your sentances in the token limit just put null charachters for the rest of the max_tokens',
        'temperature' => 0.9,
        'top_k' => 10,
        'top_p' => 0.9,
        'max_tokens' => 30,
        'web_access' => null
    ]),
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: chatgpt-42.p.rapidapi.com",
        "X-RapidAPI-Key: 173e00b092msh8eeb546115c39b5p1a4667jsn31a04304e6dc",
        "content-type: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    var_dump($response);
    $resultData = json_decode($response, true);
    var_dump($resultData);
    echo $resultData['result'];

}