<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laundry Xpert</title>

    {{-- Link bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Link Animate Css --}}
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">

    {{-- Link Icon Favicon --}}
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">

    <Style>
        body,
        html {
            padding: 0;
            margin: 0;
            height: 100%;
        }

        .loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            background-color: #007FFF;
        }

        .loading-text {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            flex-direction: row;
        }

        .loading-text img {
            animation: text-animation 2s alternate infinite;
            width: 150px;
            height: 150px;
        }

        @keyframes text-animation {
            0% {
                transform: translateY(0);
                opacity: 0;
                scale : 20%;
            }

            100% {
                transform: translateY(-20px);
                opacity: 1;
                scale : 100%;
            }
        }

        .content {
            display: none;
        }
    </Style>
</head>

<body>
    <div class="loading-screen">
        <div class="loading-text fw-bold">
            <img src="images/logo/logo-loading.svg" alt="" srcset="">
        </div>
    </div>
    
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('login') }}";
        }, 3500);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
