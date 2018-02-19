<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Noblesse -- Rechercher des personnages</h1>
            </div>        
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <hr/>
		
        <div class="row">
        	
            <h3>Identification du joueur</h3>            
			
			<?php echo form_open('noblesse/searchPerso'); ?>

			<div class="form-group col-md-4 col-xs-12">
				<label for="prenomIndiv">Prénom</label>
				<input type="text" name="prenomIndiv" class="form-control">
			</div>
			<div class="form-group col-md-4 col-xs-12">
				<label for="nomIndiv">Nom</label>
				<input type="text" name="nomIndiv" class="form-control">
			</div>
         </div>

         <div class="row">
         	<h3>Identification du personnage</h3>
        	
        	<div class="form-group col-md-4 col-xs-12">
        		<label for="prenomPerso">Prénom</label>
        		<input type="text" name="prenomPerso" class="form-control">
			</div>
        	<div class="form-group col-md-4 col-xs-12">
        		<label for="nomPerso">Nom</label>
        		<input type="text" name="nomPerso" class="form-control">
			</div>
			
        </div> 

        <div class="row">
	        <div class="col-xs-6">
	        	<button class="btn btn-primary btn-lg">Rechercher</button>
	        	<?php echo form_close(); ?>  
    		</div>
        </div>

        <?php if (isset($results)): ?>
        	<h3><?php echo count($results) ?> résultats correspondants</h3>
	        <div class="row">
				<div class="col-xs-12">
					<table class="table table-striped table-responsive">
						<tr>
							<td><strong>Prénom du Joueur</strong></td>
							<td><strong>Nom du Joueur</strong></td>
							<td><strong>Personnages</strong></td>
						</tr>
						<?php foreach ($results as $key => $result) : ?>
							<tr>
								<td><?php echo $result['prenomIndiv']; ?></td>
								<td><?php echo $result['nomIndiv']; ?></td>
								<td>
									<?php 	foreach ($result['Personnages'] as $personnage) : ?>
										<ul class="list-inline"">
											<li class="col-xs-4"><?php echo $personnage->Prenom; ?></li>
											<li class="col-xs-4"><?php echo $personnage->Nom; ?></li>
											<li class="col-xs-4" style="margin-bottom: 0.5em;">
												<?php if($personnage->Titre == NULL) : ?>
													<a href="<?php echo site_url('personnages/editPersonnage') .'/' . $personnage->Id . '/' .$result['idIndiv'] ?>">
														<button class="btn btn-primary"><span class="fa fa-eye"></span></button>
													</a>
												<?php else: ?>
													<a href="<?php echo site_url('personnages/editPersonnage') .'/' . $personnage->Id . '/' .$result['idIndiv'] ?>">
														<button class="btn btn-success"><span class="fa fa-user-circle"></span></button>
													</a>
												<?php endif; ?>
											</li>
										</ul>
									<?php endforeach; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
	        </div>
        <?php endif; ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->