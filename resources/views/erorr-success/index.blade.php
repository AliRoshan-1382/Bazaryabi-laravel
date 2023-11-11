<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png" />
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ url('public/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/style.css') }}" rel="stylesheet">
</head>
<body style="background-color:#d5d8dc ">
    <div class="container">
        <div class="row">
            <div class="col m-5 p-5 text-center">
                @if ($status)
                    <div class="alert alert-secondary alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                            {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col mt-1 text-center">
                <div class="spinner-grow" style="width: 30rem; height: 30rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <script>
                    setTimeout(function(){
                        location.href="{{ url($url) }}"
                    },2000);
                </script>
            </div>
        </div>
    </div>
    <script src="{{ url('public/vendor/global/global.min.js') }}"></script>
	<script src="{{ url('public/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('public/js/custom.min.js') }}"></script>
	<script src="{{ url('public/js/dlabnav-init.js') }}"></script>
</body>
</html>



