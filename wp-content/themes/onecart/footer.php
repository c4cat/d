<?php wp_footer(); ?>

</div>

<!-- co2 add  -->
<style>
#xinhuancontent_scroll{ display:none; top:0px; left:0px; position:absolute; z-index:10000;}
#xinhuancontent_content{filter:alpha(opacity=50);-moz-opacity:0.5; opacity:0.5; width:100%; height:100%;background-color:Black; }
#xinhuancontent{ position:relative; background-color:#F4F0EF; border:solid 5px #5FA7B5; padding:0px 10px 10px 10px; width:300px;margin:0px auto 0px auto; top: 500px;}
#xinhuancontent dl dt{ line-height:40px; font-size:14px; font-weight:bold;color:#5FA7B5; letter-spacing:2px;}
#xinhuancontent dl dt label{ display:inline-block; width:100px; text-align:right;}
#xinhuancontent dl dd{ text-align:center; line-height:22px;color:#5FA7B5;}
#xinhuancontent dl dd p{ text-indent:2em; padding-bottom:10px;}
#xinhuancontent dl dd input{ margin:0px 5px 0px 5px;}
#closediv{ height:20px;}
#closebtn{color:#5FA7B5; float:right; width:70px; height:20px; cursor:pointer; background-color:White; text-align:center; line-height:20px;}
#closebtn_{color:#5FA7B5;margin-right:10px;  float:right; width:70px; height:20px; cursor:pointer; background-color:White; text-align:center; line-height:20px;}

#testdiv{ text-align:center;}
#testdiv input { width:200px; margin-bottom:10px;}
</style>
<script type='text/javascript' src='<?php bloginfo('template_directory')?>/js/newsletter.js'></script>

<div id="xinhuancontent_scroll">
	<div id="xinhuancontent_content">
		<div id="xinhuancontent">
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