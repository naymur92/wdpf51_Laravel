<!doctype html>
<html lang="en">

<head>
  <title>Contact - Laravel 8 Project-1</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="card my-4">
            <div class="card-header bg-warning">
              <h3 class="text-center">Contact Form</h3>
            </div>
            @if (session()->has('msg'))
              <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <form action="{{ route('sendmsg') }}" method="post">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label for="_name"><strong>Your Name</strong></label>
                  <input type="text" name="name" id="_name" class="form-control"
                    placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="_email"><strong>Your Email</strong></label>
                  <input type="email" name="email" id="_email" class="form-control"
                    placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label for="_message"><strong>Message</strong></label>
                  <textarea name="message" id="_message" class="form-control" rows="10" placeholder="Write your message here"></textarea>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" value="Send Message" class="btn btn-outline-warning">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>
