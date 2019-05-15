<header class="topbar">
	<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
	
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo URL."home";?>">
				<b>
					<img src="<?php echo PUBLIC_IMG; ?>/logo-light-icon.png" alt="homepage" class="light-logo" />
				</b>
				<span style="color: #FFF; font-size: 1.2rem; font-weight: bold; text-transform: uppercase;">
					Diexeg
				</span> 
			</a>
		</div>

		<div class="navbar-collapse">
			<ul class="navbar-nav mr-auto mt-md-0">
				
				<li class="nav-item"> 
					<a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav my-lg-0">
				<li class="nav-item dropdown">
					<a class="nav-link text-muted waves-effect waves-dark" href="<?php echo URL."configuraciones";?>" id="img-profile-nav" data-placement="bottom" data-toggle="tooltip" title="Configuracion">
						<?php
						@session_start();
						if ( !empty($_SESSION)) {
						?>
							<img src="<?php echo PUBLIC_IMG."/usuarios/".$_SESSION['img']; ?>" alt="user" class="profile-pic m-r-10" width="40px" height="40px"/>
							<?php
							echo $_SESSION['user'];
						}else{
							header("location:".URL."");
						}
						?>
					</a>
				</li>

				<li class="nav-item dropdown" id="logOutHeader" style="background-color: rgba(0,0,0,0.05);">
					<a class="nav-link text-muted waves-effect waves-dark" href="#" onClick="logout(event)" data-placement="bottom" data-toggle="tooltip" title="Salir">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>