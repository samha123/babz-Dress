
  <?php 
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{ 
  $total= ProductController::cart();
}
 

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class=" font"><a href="/">Babz <br>Dresses</a></li>
        <li class=""><a href="/">Home</a></li>
        <li><a href="/myorders">Orders</a></li>
        
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      @if(Session::has('user'))
      <li><a href="/cartdetails">cart({{$total}})</a></li>
      <li class="dropdown ">
        <a class="dropdown-toggle" data-toggle="dropdown" href="/login">{{Session::get('user')['name']}}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/logout">LOGOUT</a></li>
          </ul>
      @else
     
      <li class=""><a href="/login">LOGIN</a></li>
        <li><a href="/register">REGISTER</a></li>
       
      
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>