<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>
</head>
<body>
  Title: {{$news->title}}
  <br>
  Content: {{$news->content}}
  <br>
  Writer: {{$news->writer}}
  <br>
  Published: {{$news->published}}
</body>
</html>