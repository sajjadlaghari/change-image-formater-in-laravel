<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Image Convert in Laravel</title>
</head>

<body style="    background: midnightblue;">


    <div class="container mt-5" style="margin-bottom: 100px">

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-header ">

                        <h3 class="mb-0 p-2 text-center">Image Fromate Converter</h3>
                    </div>

                    <div class="card-body">
                        <label for="">Select Image Formate</label>
                        @error('image_formate')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <select name="formate" required class="form-control mb-3" id="select-formate">
                            <option value="">Select Formate</option>
                            <option value="png">JPG to PNG</option>
                            <option value="jpg">PNG to JPG</option>
                            <option value="jpg">WEBP to JPG</option>
                            <option value="jpeg">WEBP to JPEG</option>
                            <option value="png">WEBP to PNG</option>
                            <option value="webp">PNG to WEBP </option>
                            <option value="jpeg">PNG to JPEG </option>
                            <option value="webp">JPG to WEBP </option>
                            <option value="jpeg">JPG to JPEG </option>
                        </select>
                        <div class="formhead">
                            <form action="{{ route('image.convert') }}" method="POST" enctype="multipart/form-data">
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" required id="" class="form-control">
                            <input type="hidden" id="image_formate" name="image_formate">
                            <button type="submit" class="btn btn-primary mt-4">Upload Image</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-5 d-flex justify-content-center ">

            @if (Session::get('filename'))
                <div class="col-md-6">
                    <h4 class="text-center">
                        <a href="{{ asset('image/' . Session::get('filename')) }}"
                            class="text-dark text-decoration-none btn " download style="background: #fff">Download</a>

                    </h4>
                    <div class="card">
                        <img src="{{ asset('image/' . Session::get('filename')) }}" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <script>
        $(document).on('change', '#select-formate', function() {
            var val = $('#select-formate option:selected').val();
            $('#image_formate').val(val);
        })
    </script>
</body>

</html>
