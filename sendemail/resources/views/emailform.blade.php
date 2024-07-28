<!doctype html>
<html lang="en">

<head>
    <title>Email Send Form</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="row container m-auto">
        <div class="col-lg-12 col-12 mb-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <main class="container">
        <div class="row p-5">
            <div class="col-lg-12 col-12 mt-2 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="fs-5">Send Email Form</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{url('sendemail')}}" method="POST">
                            @csrf
                            <div class="form-group mt-3 mb-3">
                                <label for="">Email :</label>
                                <input type="email" name="email" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="">Body :</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <input type="submit" value="Send Email" class="form-control-sm btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
