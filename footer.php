	<div class="footer">
		<script>
			$(document).pjax('a[target!=_blank]', '#main', {fragment:'#main', timeout:8000});
			$(document).on('pjax:send', function() { //pjax链接点击后显示加载动画；
				$('#main').fadeTo(700,0);
			});
			$(document).on('pjax:complete', function() { //pjax链接加载完成后隐藏加载动画
				ComtAjax();
				$('#main').fadeTo(700,1);
			});
		</script>
		<div class="wid">
			<p>Powered By <a href="https://wordpress.org" target="_blank">WordPress</a> · Theme By <a href="https://biantan.org">Clien</a></p>
			<p>本博客使用 <a href="https://creativecommons.org/licenses/by-nc-sa/3.0/deed.zh" target="_blank">CC BY-NC-SA 3.0</a> 进行许可</p>
		</div>
	</div>
</body>
</html>