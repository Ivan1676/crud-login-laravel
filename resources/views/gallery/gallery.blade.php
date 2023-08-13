@include('../layouts/body')
@include('../layouts/navbar')

<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <link href="{{ asset('css/gallery/gallery.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{ asset('images/icons/icono1.ico') }}">
</head>

<body>
    <div class="gallery">
        <ul class="controls">
            <li class="buttons active" data-filter="all">All</li>
            <li class="buttons" data-filter="demonsSouls">Demons Souls</li>
            <li class="buttons" data-filter="darkSouls">Dark Souls</li>
            <li class="buttons" data-filter="bloodborne">Bloodborne</li>
            <li class="buttons" data-filter="sekiro">Sekiro</li>
            <li class="buttons" data-filter="eldenRing">Elden Ring</li>
        </ul>
        <!-- ... -->
        <div class="image-container">
            @php
                $jsonFilePath = public_path('json/gallery/gallery.json');
                $json = file_get_contents($jsonFilePath);
                $jsonData = json_decode($json, true);

                $images = $jsonData['images'];
                $totalImages = count($images);

                foreach ($images as $index => $image) {
                    $image['url'] = asset($image['url']);

                    // Check if this is the last image
                    $isLastImage = $index === $totalImages - 1;

                    // Display the image
                    echo '<a href="' . $image['url'] . '" class="image ' . $image['filter'] . '">';
                    echo '<img src="' . $image['url'] . '" alt="' . $image['filter'] . '" />';
                    echo '</a>';

                    // Stop the loop if it's the image before the last
                    if ($isLastImage) {
                        break;
                    }
                }
            @endphp
        </div>

    </div>
    <script src="{{ asset('js/gallery/gallery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
</body>
