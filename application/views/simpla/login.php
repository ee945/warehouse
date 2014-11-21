<?php
include_once ('tpl.header.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $("input#name").focus();
});
</script>
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/simpla/images/logo1.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="<?php echo base_url();?>login/checklogin" method="POST">
				<!--
					<div class="notification information png_bg">
						<div>
							Just click "Sign In". No password needed.
						</div>
					</div>
				-->
					<p>
						<label>帐&nbsp;号</label>
						<input id="name" class="text-input" type="text" name="name"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>密&nbsp;码</label>
						<input class="text-input" type="password" name="pass"/>
					</p>
					<div class="clear"></div>
					<!--
                    <p id="remember-password">
						<input type="checkbox" name="rememberme" value="1"/>记住我
					</p>
					<div class="clear"></div>
                    -->
					<p>
						<input class="button" type="submit" value="登&nbsp;录" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>
