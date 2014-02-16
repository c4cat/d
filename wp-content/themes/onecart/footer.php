<?php wp_footer(); ?>

</div>

<!-- co2 add  -->
<style>
#email-all{ display:none; top:0px; left:0px; position:absolute; z-index:10000;}
#email-bg{filter:alpha(opacity=50);-moz-opacity:0.5; opacity:0.5; width:100%; height:100%;background-color:#000; }
#email-content{ position:fixed; background-color:#F4F0EF; border:solid 5px #5FA7B5; padding:0px 10px 10px 10px; width:300px;margin:0px auto 0px auto; top: 30%;}
#closediv{ height:20px;}
#closebtn{color:#5FA7B5; float:right; width:70px; height:20px; cursor:pointer; background-color:#fff; text-align:center; line-height:20px;}
#closebtn_{color:#5FA7B5;margin-right:10px;  float:right; width:70px; height:20px; cursor:pointer; background-color:#fff; text-align:center; line-height:20px;}

</style>
<script type='text/javascript' src='<?php bloginfo('template_directory')?>/js/newsletter.js'></script>

<div id="email-all">
	<div id="email-bg">
		<div id="email-content">
			<div id="closediv"><div id="closebtn">以后提醒</div><div id="closebtn_">不再提醒</div></div>
 				<form method="post" action="http://dress4club.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
				<table>	
					<tbody>
						<tr></tr>
						<tr>
							<td><input type="email" placeholder="Email" name="ne" size="20" required=""></td>
						</tr>
						<tr>
							<td class="newsletter-td-submit">
								<input class="newsletter-submit" type="submit" value="Subscribe">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<!-- co2 add  -->

</body>
</html>