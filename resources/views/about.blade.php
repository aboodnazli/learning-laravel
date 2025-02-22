<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome to my website! {{$name}}</h1>
<form method="POST" action="about">
   @csrf
   <input type="text" name="name" id="name"><br><br>
   <select name="department" id="department">

         @foreach ($departments as $key => $department)
         <option value="{{$key}}">{{$department}}</option>

         @endforeach
   </select><br><br>
   <input type="submit" value="send"><br><br>


</form>


</body>
</html>
