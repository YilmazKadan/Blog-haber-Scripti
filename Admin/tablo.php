<?php include 'sidebar.php'; ?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.php';?>

    <style>

        th,td{
            text-align: center;
        }
        #btn{
            width: 90px;
        }

    </style>

    <div class="content mt-3">
        <div class="animated ">

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body table-responsive">
                    <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Makale Fotoğraf</th>
                                <th>Makale başlık</th>
                                <th>Makale Tarih</th>
                                <th>Okunma sayısı</th>
                                
                                <th >İşlemLer</th>
                                <th >İşlemLer</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php  for ($i=0; $i <22 ; $i++) { ?>

                            <tr>
                                <td style="padding: 0;"><img width="350" src="https://iasbh.tmgrup.com.tr/ef52ba/752/395/0/97/810/523?u=https://isbh.tmgrup.com.tr/sbh/2018/11/01/makale-nedir-makale-nasil-yazilir-1541061272688.jpg"></td>
                                <td >Deneme makale</td>
                                <td>21.04.2019</td>
                                <td>450</td>
                                
                                <td><button class=" btn btn-outline-primary"> Güncelle</button></td>
                                <td><button id="btn" class=" btn btn-outline-danger"> Sil</button></td>
                            </tr>  
                        <?php } ?>
                                              
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include 'footer.php';?>