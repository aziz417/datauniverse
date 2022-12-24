<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Question</title>
</head>
<body>
<div style="text-align: center">
    <a href="{{ route('home') }}">
        <img loading="lazy" width="40%" src="{{ @$globalSettingInfo->image->url }}" alt="messages">
    </a>
</div>
<h2><strong>User Name: </strong>{{ $question_details['name'] }}</h2>
<hr>
<p><strong>Email: </strong>{{ $question_details['email'] }}</p>
<p><strong>Subject: </strong>{{ $question_details['subject'] }}</p>
<hr>
<p><strong>Message Body: </strong>{{ $question_details['message'] }}</p>
</body>
</html>
