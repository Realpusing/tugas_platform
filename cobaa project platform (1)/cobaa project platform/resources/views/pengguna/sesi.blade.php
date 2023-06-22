
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HTML Login Page with Bootstrap Example</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<style>
    body{
  background: #F0FFFF !important;
  font-family: 'Muli', sans-serif;
  
}
h1{
  color: #000;
  padding-bottom: 2rem;
  font-weight: bold;
}
a{
  color: #333;
}
a:hover{
  color: #E8D426;
  text-decoration: none;
}
.form-control:focus {

    color: #000;
    background-color: #fff;
    border:2px solid #E8D426;
    outline: 0;
    box-shadow: none;

}

.btn{
  background: #E8D426;
  border: #E8D426;
}
.btn:hover {
  background: #E8D426;
  border: #E8D426;
}
</style>
<div class="pt-5">
  <h1 class="text-center">Selamat Datang di Website Perpustakaan USD</h1>
  
<div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                                                   
                        <form action="{{route('postlogin')}} " method="post" >
                            @csrf
                            <div class="form-group required">
                                    <lSabel for="username">NIM</lSabel>
                                    <input type="text"  class="form-control text-lowercase" required="" name="nomor" placeholder="NIM">
                                </div>                    
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password">Password 
                                        <a class="ml-auto border-link small-xl" href="/forget-password">Forget?</a></label>
                                    <input type="password" class="form-control" required=""  name="password" placeholder="password"">
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember me?</label>
                                    </div>
                                </div>
                                <div class="form-group pt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                </div>
                            </form>
                            <p class="small-xl pt-3 text-center">
                              
                                <span name =""submitclass="text-muted">Masuk Sebagai Admin?</span>
                                <a href="/admin" name="">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div>
<!-- partial -->
  
</body>
</html>

