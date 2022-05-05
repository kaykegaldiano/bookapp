<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Create a new book</div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="POST">@csrf
                            <label class="form-label" for="name">Name of book</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name of book">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label class="form-label" for="description">Description of book</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <br>
                            <label class="form-label" for="category">Category</label>
                            <select class="form-select" name="category" id="category">
                                <option value=""></option>
                                <option value="frictional">Frictional Book</option>
                                <option value="biography">Biography Book</option>
                                <option value="comedy">Comedy Book</option>
                                <option value="novel">Novel Book</option>
                                <option value="educational">Education</option>
                            </select>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
