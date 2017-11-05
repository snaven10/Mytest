
					</div>
				</div>
				<?php
					include 'modal.php';
				 ?>
				<!-- Bootstrap JavaScript -->
				<script src="../js/bootstrap.min.js"></script>
				<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>
    			<script type="text/javascript" language="javascript" src="../js/dataTables.bootstrap.min.js"></script>
    			<script type="text/javascript" language="javascript" src="../js/addpedido.js"></script>
				<?php if (isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==2) { ?>
				<script type="text/javascript">
					$(document).ready(function() {
						data_table();
						$(".contP").hide('slow');
						$.post('../admin/addentradas.php', {key: '1'}, function(data, textStatus, xhr) {
							$("#dp").html(data);
						});

						$('#vp').click(function(event) {
							shCont();
						});
					})
				</script>
				<?php }else if(isset($_SESSION['Id']) && isset($_SESSION['Nivel']) && $_SESSION['Nivel'] ==1){ ?>
				<script type="text/javascript">
					$(document).ready(function() {
						data_table();
						$(".contP").hide('slow');
						$.post('../admin/addSSpedido.php', {key: '1'}, function(data, textStatus, xhr) {
							$("#dp").html(data);
						});

						$('#vp').click(function(event) {
							shCont();
						});
					});
				</script>
				<?php } ?>
			</body>
		</html>
