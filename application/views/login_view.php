<h1>Sign in page</h1>
<p>
<form action="" method="post">
<table class="login">
	<tr>
		<th colspan="2">Sign in</th>
	</tr>
	<tr>
		<td>login</td>
		<td><input type="text" name="login"></td>
	</tr>
	<tr>
		<td>password</td>
		<td><input type="password" name="password"></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Submit" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>
</p>

<?php extract($data); ?>
<?php if($login_status=="access_granted") { ?>
<p style="color:green">Sucsess.</p>
<?php } elseif($login_status=="access_denied") { ?>
<p style="color:red">Login and/or password was wrong.</p>
<?php } ?>
