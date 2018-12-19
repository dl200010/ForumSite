<?php
	if (isset($_POST["Login"])) {
		include 'act_login.php';
	}
?>

<header id="header">
	<h2>Login</h2>
</header>
<section>
	<div class="6u$ 12u$(medium)">
		<form method="post">
			<div class="row uniform">
				<div class="6u$ 12u$(xsmall)">
					<input type="email" name="email" id="email" placeholder="Email" />
				</div>
			</div>
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="password" name="password" id="password" placeholder="password" />
				</div>
			</div>
			<div class="row uniform align-center">
				<div class="6u 12u$(xsmall)">
					<ul class="actions">
						<li><input type="submit" name="Login" value="Login" class="special" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>