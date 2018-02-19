<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Outils de Gestion</h1>

                <h3>Présence par heure de <?php echo $presencesCount['activite']->Nom; ?></h3>
                <div class="row">
                    <div class="col-md-3 col-xs-8">
                        <select name="selectActiv" id="selectActiv" class="form-control">
                            <?php foreach ($presencesCount['listGN'] as $GN) : ?>
                                <option value="<?php echo $GN->Id; ?>"><?php echo $GN->Nom; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div id="chartContainer" class="row">

                    <div class="col-md-8 col-xs-12">
                        <div id="chart">                        
                        </div>
                    </div>

                    <script>
                        new Morris.Bar({
                            element : 'chart',
                            data : <?php echo json_encode($presencesCount['heures']); ?>,
                            xkey : 'heures',
                            ykeys : ['nombrePresences'],
                            labels : ['nombrePresences']
                        });
                    </script>

                    <div class="col-xs-12">
                        <h3>Personnages par...</h3>
                        <div class="col-xs-12 col-md-4 text-center">
                            <h4>Race</h4>
                            <div id="donut_races">
                            </div>
            
                            <script>
                                var arrRaces = <?php echo json_encode($racesCount); ?>;
                                new Morris.Donut({
                                    element: 'donut_races',
                                    data : arrRaces,
                                    resize :  true,
                                });
                            </script>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <h4>Classe</h4>
                            <div id="donut_classes">
                            </div>

                            <script>
                                var arrClasses = <?php echo json_encode($classesCount); ?>;
                                new Morris.Donut({
                                    element: 'donut_classes',
                                    data : arrClasses,
                                    resize :  true,
                                });
                            </script>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <h4>Religion</h4>
                            <div id="donut_religions">
                            </div>

                            <script>
                                var arrReligion = <?php echo json_encode($religionCount); ?>;
                                new Morris.Donut({
                                    element: 'donut_religions',
                                    data : arrReligion,
                                    resize :  true,
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <h3>Personnages (Code État = "LEVEL") par...</h3>
                    <div class="col-xs-12 col-md-4 text-center">
                        <h4>Race</h4>
                        <div id="donut_races">
                        </div>

                        <script>
                            var arrRaces = <?php echo json_encode($racesCount); ?>;
                            new Morris.Donut({
                                element: 'donut_races',
                                data : arrRaces,
                                resize :  true,
                            });
                        </script>
                    </div>
                    <div class="col-xs-12 col-md-4 text-center">
                        <h4>Classe</h4>
                        <div id="donut_classes">
                        </div>

                        <script>
                            var arrClasses = <?php echo json_encode($classesCount); ?>;
                            new Morris.Donut({
                                element: 'donut_classes',
                                data : arrClasses,
                                resize :  true,
                            });
                        </script>
                    </div>
                    <div class="col-xs-12 col-md-4 text-center">
                        <h4>Religion</h4>
                        <div id="donut_religions">
                        </div>

                        <script>
                            var arrReligion = <?php echo json_encode($religionCount); ?>;
                            new Morris.Donut({
                                element: 'donut_religions',
                                data : arrReligion,
                                resize :  true,
                            });
                        </script>
                    </div>
                </div>-->
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    $(function(){
        
        var controller = 'Home',
            base_url = '<?php echo site_url();?>', 
            data;
        
        $('#selectActiv').on('change', function(event){            
            event.preventDefault(); 
            IdActiv = $('#selectActiv :selected').val();
            switchChart_ajax(IdActiv);            
        });
        
      
        function switchChart_ajax(IdActiv){            
            $.ajax({
                'url' : base_url + '/' + controller + '/switchChart', 
                'type' : 'POST',
                'data' : {'IdActiv' : IdActiv},
                'success' : function(data){ 
                    var container = $('#chartContainer');
                    if(data){
                        container.html(data);
                    }
                }
            });
           
        }
     });
</script>
