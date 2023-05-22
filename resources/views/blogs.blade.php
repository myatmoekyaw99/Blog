<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
   <?php foreach($blogs as $blog) : ?>
    <div>
        <a href="/blogs/{{$blog->id}}"><h1><?= $blog->title; ?></h1></a>
        <p>{{$blog->body}}</p>
    </div>   
    <?php endforeach ;?>
</body>
</html>