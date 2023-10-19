<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m-5 p-5 text-center">
                @if ($status)
                    <div class="alert alert-success">
                        <strong>موفق! </strong>{{ $message }}
                    </div>
                @else
                    <span class="text-danger"></span>
                    <div class="alert alert-danger">
                        <strong>خطا ! </strong>{{ $message }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col mt-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="480px" height="480px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <g transform="translate(50 42)">
                            <g transform="scale(0.8)">
                                <g transform="translate(-50 -50)">
                                <polygon fill="#ed0212" points="72.5 50 50 11 27.5 50 50 50">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.1111111111111112s" values="0 50 38.5;360 50 38.5" keyTimes="0;1"></animateTransform>
                                </polygon>
                                <polygon fill="#262524" points="5 89 50 89 27.5 50">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.1111111111111112s" values="0 27.5 77.5;360 27.5 77.5" keyTimes="0;1"></animateTransform>
                                </polygon>
                                <polygon fill="#0828e6" points="72.5 50 50 89 95 89">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.1111111111111112s" values="0 72.5 77.5;360 72 77.5" keyTimes="0;1"></animateTransform>
                                </polygon>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <script>
                        setTimeout(function(){
                            location.href="{{ url($url) }}"
                        },1000);
                    </script>
            </div>
        </div>
    </div>
</body>
</html>



