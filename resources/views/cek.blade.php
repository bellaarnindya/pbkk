<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="/cekInven" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <input type="text" name="cek_booking" class="form-control" placeholder="Kode Booking">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

</div>

</body>
</html>
