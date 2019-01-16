<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SparkBlog</title>
        <link href='https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Noto+Sans:700,400' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="site-header">
                    <a class="logo" href="index.html">SparkBlog</a>
                    <a class="new-entry button button-round" href="new.html"><i class="material-icons">create</i></a>
                </div>
            </div>
        </header>
        <section>
            <div class="container">
                <div class="entry-list single">
                    <article>
                        <h1>The best day I’ve ever had</h1>
                        <time datetime="2016-01-31 1:00">January 31, 2016 at 1:00</time>
                        <div class="entry">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut rhoncus felis, vel tincidunt neque. Vestibulum ut metus eleifend, malesuada nisl at, scelerisque sapien. Vivamus pharetra massa libero, sed feugiat turpis efficitur at.</p>
                            <p>Cras egestas ac ipsum in posuere. Fusce suscipit, libero id malesuada placerat, orci velit semper metus, quis pulvinar sem nunc vel augue. In ornare tempor metus, sit amet congue justo porta et. Etiam pretium, sapien non fermentum consequat, <a href="">dolor augue</a> gravida lacus, non accumsan lorem odio id risus. Vestibulum pharetra tempor molestie. Integer sollicitudin ante ipsum, a luctus nisi egestas eu. Cras accumsan cursus ante, non dapibus tempor.</p>
                            <p><a class="link" href="edit.html">Edit Entry</a></p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="entry-comments">
            <div class="container">
                    <h2>Comments</h2>
                    <div class="comment">
                        <strong>Carling Kirk</strong>
                        <time datetime="2016-01-31 1:00">January 31, 2016 at 1:00</time>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut rhoncus felis, vel tincidunt neque. Vestibulum ut metus eleifend, malesuada nisl at, scelerisque sapien. Vivamus pharetra massa libero, sed feugiat turpis efficitur at.</p>
                    </div>
                    <div class="new-comment">
                        <form>
                              <label for="name"> Name</label>
                              <input type="text" name="name"><br>
                              <label for="comment">Comment</label>
                              <textarea rows="5" name="comment"></textarea>
                              <input type="submit" value="Post Comment" class="button">
                        </form>
                    </div>
            </div>
        </section>
        <footer>
            <div>
                <a href="#">Contact Us</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;
                <a href="#">Terms</a>
            </div>
        </footer>
    </body>
</html>
