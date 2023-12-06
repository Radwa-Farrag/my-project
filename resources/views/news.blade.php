<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add News</h2>
  <form action="{{route('news')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{old('title')}}">
      @error('title')
      <div class="alert alert-warning" > 
      {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" name="content" rows="5" id="content"></textarea>
        @error('content')
        <div class="alert alert-warning" > 
        {{ $message }}
      </div>
        @enderror
      </div>
    <div class="form-group">
      <label for="price">Writer:</label>
      <input type="text" class="form-control" id="writer" placeholder="Enter writer" name="writer">
      @error('writer')
        <div class="alert alert-warning" > 
        {{ $message }}
      </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="price">Image:</label>
      <input type="file" class="form-control" id="image" value="{{old ('image')}}" name="image">
      @error('image')
        <div class="alert alert-warning" > 
        {{ $message }}
      </div>
        @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
