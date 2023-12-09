<!DOCTYPE html>
<html lang="en">
<head>
  <title>Updat News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update News</h2>
  <form action="{{ route('updatenews',$news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" value= "{{$news->title}}" name="title">
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" name="content" rows="5" id="content">{{$news->content}}</textarea>
      </div> 
      <div class="form-group">
        <label for="writer">Writer:</label>
        <textarea class="form-control" value= "{{$news->writer}}"name="writer" rows="5" id="writer">{{$news->writer}}</textarea>
      </div> 
      <div class="form-group">
      <label for="price">Image:</label>
      <input type="file" class="form-control" id="image" value="{{$news->image}}" name="image">
      <img src="../assets/images/{{$news->image}}" alt="{{$news->title}}" style="width:300px;">
      @error('image')
        <div class="alert alert-warning" > 
        {{ $message }}
      </div>
        @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($news->published)> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>
