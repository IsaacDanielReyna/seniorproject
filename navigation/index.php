
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../main">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Components<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../timeclock">Time-Clock</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="#">Paid Time Off</a></li>
          </ul>
        </li>
        <li id="timeclock"><a href="../timeclock">Time-Clock <span class="sr-only">(current)</span></a></li>
		<li><a href="#">Messages <span class="badge">3</span></a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as <strong><?=$user->username?></strong> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../profile">Profile</a></li>
            <li role="separator" class="divider"></li>
			<li><a href="#">Request PTO</a></li>
            <li><a href="../logout">Sign out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
