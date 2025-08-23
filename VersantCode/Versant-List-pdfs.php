<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TD VUE LOOKUPs</title>
  <style>
    @font-face {
      font-family: 'NBC Universal Font';
      src: url('fonts/TT Hoves Pro Trial Expanded DemiBold.woff2') format('woff2');
    }
    @font-face {
      font-family: 'TT Hoves Thin';
      src: url('fonts/TT Hoves Pro Trial Regular.woff2') format('woff2');
    }

    body {
      font-family: sans-serif;
      margin: 0;
      padding: 20px;
    }

    img {
      display: block;
      margin-bottom: 4px;
    }

    h2 {
      font-family: 'NBC Universal Font', sans-serif;
      font-size: 24px;
      margin: 0 0 10px;
    }

    ul {
      margin: 0;
      padding-left: 0;
      list-style: none;
    }

    ul li {
      margin-bottom: 6px;
    }

    ul li a {
      font-family: 'TT Hoves Thin', monospace;
      font-size: 20px;
      text-decoration: none;
      color: #0044cc;
    }

    ul li a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <img src="Versant_Logo.jpg" width="275" alt="Versant Logo">
  <h2>TD File Lookup</h2>

  <?php include __DIR__ . '/list-pdfs.php'; ?>

</body>
</html>
