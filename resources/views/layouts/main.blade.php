<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Notre Blog Wesh</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
<link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">Blog</li>
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</div>

<div class="callout large primary">
    <div class="text-center">
        <h1>Notre Blog</h1>
        <h2 class="subheader">Un template simple de notre blog</h2>
    </div>
</div>

<article class="grid-container">
    <!-- <div class="grid-x align-center">
        <div class="cell medium-8">
            @yield('content')
        </div>
    </div> -->
    <!-- <div class="grid-x align-center">
        <div class="cell medium-8">
            @yield('content')
        </div>
    </div> -->
    <!-- <div class="grid-x align-center">
        <div class="cell medium-8">
            @yield('content')
        </div>
    </div> -->
    <div class="grid-x align-center">
        <div class="cell medium-8">
            @yield('content')
        </div>
    </div>
</article>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
