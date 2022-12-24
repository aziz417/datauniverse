<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Message</title>
</head>
<body>
<div style="text-align: center">
    <a href="{{ route('home') }}">
        <img loading="lazy" width="40%" src="{{ @$globalSettingInfo->image->url }}" alt="messages">
    </a>
</div>
<h2><strong>User Name: </strong>{{ $contact_details['name'] }}</h2>
<hr>
<p><strong>Email: </strong>{{ $contact_details['email'] }}</p>
<p><strong>Subject: </strong>{{ $contact_details['subject'] }}</p>
<hr>
<p><strong>Message Body: </strong>{{ $contact_details['message'] }}</p>
</body>
</html>
