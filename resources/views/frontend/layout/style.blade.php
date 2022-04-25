<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $profile->name }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/fontAwesome/css/font-awesome.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<script src="{{ asset('frontend/assets/js/jquery-2.2.2.min.js') }}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('frontend/assets/bower_components/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/assets/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
	<link rel="icon" href="{{ asset('frontend/assets/image/elite-laundry11.png') }}" type="image/png" sizes="17x17">
  <style>
   .details{
        background-image: url('{{ asset('frontend/assets/image/background.jpg') }}');
        background-attachment: fixed;
        background-repeat: no-repeat;
        /* height: 380px; */
      }
.commerical{
        background-image: url('{{ asset('frontend/assets/image/commerical-laundry.jpg') }}');
        background-attachment: fixed;
        background-repeat: no-repeat;
}
.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn {
  margin-right: auto;
  margin-left: auto;
    display: block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
hr {
  width: 100%;
   height: 21px;
  margin-left: auto;
  margin-right: auto;
  /*background-color:#89ba40;*/
  border: 0 none;
  margin-top: 0;
  margin-bottom:0;
}
</style>
</head>
<body>