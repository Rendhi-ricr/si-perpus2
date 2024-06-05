<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo (base_url()) ?>/css/style.css">
</head>

<body>
    <?= $this->include('layouts/frontend/includes/navbar') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('layouts/frontend/includes/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -6.57749,
                    lng: 107.78295
                },
                zoom: 15
            });

            var libraryMarker = new google.maps.Marker({
                position: {
                    lat: -6.57749,
                    lng: 107.78295
                },
                map: map,
                title: 'Perpustakaan'
            });
        }

        // Load the Google Maps API
        var script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDCQrISQQc2Aq01_20bNtmNHpm90hpvd2c&callback=initMap';
        document.body.appendChild(script);
    </script>
</body>

</html>