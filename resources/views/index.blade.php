<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>フェイクウィルズ警告サイト</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Hiragino Kaku Gothic Pro';
            font-weight: 200;
            margin: 0;
        }

        .content {
            margin: 30px;
        }

        .title {
            font-size: 24px;
            margin: 10px 0;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .close-btn {
            background-color: #0055e3;
            color: #FFFFFF;
            border-radius: 30px;
            font-size: 12px;
            font-weight: normal;
            margin: 20px;
            width: 180px;
            height: 42px;
        }

        .button_wrapper{
            text-align:center;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="title">
        <?php
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $deviceName = 'unknown device';
        if (preg_match("/Android/i", $ua)) {
            if (preg_match("/Mobile/i", $ua)) {
                $strOSName = "Android Mobile";
            } else {
                $strOSName = "Android";
            }
            $matches = array();
            preg_match('/Android [0-9A-Za-z.\;\-\_\s]+; ([0-9A-Za-z\-\_ \/]+) /i', $ua, $matches);
            if (! $matches) {
                preg_match('/Android [0-9A-Za-z.\;\-\_\s]+; ([0-9A-Za-z\-\_ \/]+)\)/i', $ua, $matches);
            }
            $deviceName     = isset($matches[1]) ? $matches[1] : "";
        } elseif (preg_match("/iPhone/i", $ua))  {
            $deviceName     = "iPhone";
        } elseif (preg_match("/iPad/i", $ua))  {
            $deviceName     = "iPad";
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipArray = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = $ipArray[0];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        ?>
        <?php echo $deviceName; ?>でウィルズが<?php echo mt_rand(1, 8); ?>個検出されました。
    </div>

    <div>
        お使いの<?php echo $deviceName; ?>（IPアドレス:<?php echo $ip; ?>）のウィルズ感染が検出されました。以下の対策を取ってください。<br><br>
        ※ このサイトはジョークサイトです。本当には感染していないのでご安心ください。
    </div>

    <div class="button_wrapper">
        <a href="https://www.youtube.com/channel/UCuYiSs3MVn3BWtHPsGQ8vIA/"><button class="close-btn">閉じて動画に戻る</button></a>
    </div>
</div>
</body>
</html>
