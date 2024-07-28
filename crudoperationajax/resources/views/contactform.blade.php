<!doctype html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <main class="containers">
        <div class="row p-5">
            <div class="col-lg-12 col-12 mt-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="fs-5">Contact Us Form</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('api/contactus') }}" method="POST">
                            @csrf
                            <div class="form-group mt-3 mb-3">
                                <label for="name">Name :</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="email">Email :</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="contactno">Contact No :</label>
                                <input type="text" name="contactno" id="contactno" class="form-control">
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control" id="message"></textarea>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <input type="submit" value="Submit" id="submitFormData"
                                    class="form-control-sm btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('#submitFormData').on('click', function() {
                const name = $('#name').val();
                const email = $('#email').val();
                const contactno = $('#contactno').val();
                const message = $('#message').val();

                $.ajax({
                    url: 'api/contactus',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        name: name,
                        email: email,
                        contactno: contactno,
                        message: message,
                    }),
                    success: function(response) {
                        console.log(response);
                        window.location.href = "http://127.0.0.1:8000/contactus";
                        alert('Data insert successfully');
                    },
                    error:function(xhr,status,error){
                        alert('Error :' + xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
