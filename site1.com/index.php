<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title>Page 1</title>
  </head>
  <body>
    <header><a href="index.php?page=subpage_1">subpage 1</a></header>
    <main><a href="index.php?page=subpage_2">subpage 2</a></main>
    <footer><a href="index.php?page=subpage_3">subpage 3</a></footer>
  </body>

  <script type="text/javascript">
    var siteCode = "QWERTY";
    var trackingPage = window.location.href;

    var scriptElement = document.createElement("script");
    scriptElement.src = "http://localhost:8080/tracking?siteCode=" + siteCode + "&trackingPage=" + trackingPage;
    document.head.appendChild(scriptElement);
  </script>

</html>
