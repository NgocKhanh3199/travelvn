<html>
  <head>
    <title>Simple Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- playground-hide -->
    <script>
      const process = { env: {} };
      process.env.GOOGLE_MAPS_API_KEY =
        "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg";
    </script>
    <!-- playground-hide-end -->

    <link rel="stylesheet" type="text/css" href="./public/css/style.css" />
    <script type="module" src="./public/js/index.js"></script>
  </head>
  <body>
    <div id="map"></div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>
  </body>
</html>