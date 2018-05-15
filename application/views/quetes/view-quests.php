<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Voir les quêtes</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
        	<div class="col-xs-12">
        		<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#actif">En cours <span class="badge badge-light"><?php echo count($quetes['actif']); ?></span></a></li>
				    <li><a data-toggle="tab" href="#dem">Demandes <span class="badge badge-light"><?php echo count($quetes['dem']); ?></span></a></li>
				</ul>

				<div class="tab-content">
					<div id="actif" class="tab-pane fade in active">
						<h3>Quêtes actives</h3>
						<pre><?php echo var_dump($quetes['actif'][0]); ?></pre>
					</div>
					<div id="dem" class="tab-pane fade">
						<h3>Demande de quêtes</h3>
						<pre><?php echo var_dump($quetes['dem'][0]); ?></pre>
					</div>
				</div>
	        	<table class="table table-striped table-responsive">
	        		<!--<?php foreach ($quetes as $quete) : ?>
	        			<tr>
	        				<td><?php echo $quete->IdPersonnage; ?></td>
	        				<td><?php echo $quete->Objet; ?></td>
	        				<td><?php echo $quete->Suggestions; ?></td>
	        				<td><?php echo $quete->Parties; ?></td>
	        				<td><?php echo $quete->CodeEtat; ?></td>
	        				<td><?php echo $quete->IdResponsable; ?></td>
	        			</tr>
	        		<?php endforeach; ?>-->
	        	</table>
	        </div>
        </div>
    </div>
</div>