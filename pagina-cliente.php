<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="lightbox/js/jquery-1.7.2.min.js"></script>
       <script src="lightbox/js/lightbox.js"></script>
       <link href="lightbox/css/lightbox.css" rel="stylesheet" />

    
<?php
    if(isset($_GET['for_id']) and !empty($_GET['for_id'])){
        $query = $listapagina->db->query("
            SELECT f.*, e.est_dsc, c.cid_dsc FROM  `tb_fornecedor` as f 
            left join tb_estado as e ON (f.est_codigo=e.est_codigo)
            left join tb_cidade as c ON (f.cid_codigo=c.cid_codigo)
            where for_codigo = {$_GET['for_id']} limit 1
        ");
        $fornecedor = $listapagina->db->fetch_assoc($query);
    }
    else{
        header('Location: pesquisa.php');
    }
?>
<!-- CORPO -->
<div id="corpo">
	<div id="corpo_pagina_cliente">
    	<div class="info-pagina-cliente">
        	
            <?php 
                if(!empty($fornecedor['ft01'])){
                    echo "<img class='logo-cliente' src='{$fornecedor['ft01']}' alt='Logo Cliente' height='150px' width='150px' />";
                }
            ?>
            <div class="info-conteudo-pagina-cliente">
            	<h1><?=$fornecedor['for_dsc']?></h1>
                <hr />
                <p style="width:550px; text-align:justify;"><?=$fornecedor['for_comentario']?></p>
            </div>
        	                      
            <div class="galeria-pagina-cliente">
            	<table width="370" height="370" border="0">
                	<tr>
                    	<td>
                            <?php 
                                if(!empty($fornecedor['ft04'])){
                                    echo "<a href='{$fornecedor['ft04']}' rel='lightbox[plants]'>
                                            <img src='{$fornecedor['ft04']}' height='150px' width='150px' alt='' />
                                        </a>";
                                }
                            ?>
                        </td>
            			<td>
                            <?php 
                                if(!empty($fornecedor['ft02'])){
                                    echo "<a href='{$fornecedor['ft02']}' rel='lightbox[plants]'>
                                            <img src='{$fornecedor['ft02']}' height='150px' width='150px' alt='' />
                                        </a>";
                                }
                            ?>
            			</td>
                    </tr>
                    <tr>
                    	<td>            
                            <?php 
                                if(!empty($fornecedor['ft03'])){
                                    echo "<a href='{$fornecedor['ft03']}' rel='lightbox[plants]'>
                                            <img src='{$fornecedor['ft03']}' height='150px' width='150px' alt='' />
                                        </a>";
                                }
                            ?>
            			</td>
                        <td>&nbsp;</td> 
                    </tr>
            	</table>            
            </div>
            
            <div class="mapa-pagina-cliente" id="map-canvas">
                <!--<iframe width="370" height="370" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Normatel+Home+Center+-+Avenida+Bezerra+de+Menezes,+Fortaleza+-+Ceara,+Brazil&amp;aq=0&amp;oq=Normatel+Home+Center+-+Avenida+&amp;sll=-3.779214,-38.561271&amp;sspn=0.00607,0.010504&amp;ie=UTF8&amp;hq=Normatel+Home+Center+-&amp;hnear=Av.+Bezerra+de+Menezes,+Fortaleza+-+Cear%C3%A1,+Brazil&amp;t=m&amp;ll=-3.731616,-38.545876&amp;spn=0.007923,0.007918&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>-->
            </div>
          
         <br style="clear:both;" />
          
         <hr style="height:3px; border:none; background:#999; margin:20px 0;" />
         
         <div class="info-contato-cliente">
         	<table style="width:750px;">
            	<tr>
                	<td>
            <div class="icon-tel"></div><h4 style="height:30px; width:auto; padding-top:5px;">+55 <?=$fornecedor['for_cel']?> &nbsp;&nbsp;&nbsp;</h4>
            		</td>
                    <td>
            <div class="icon-email"></div><h4 style="height:30px; width:auto; padding-top:5px;"><?=$fornecedor['for_email']?></h4>
            		</td>
                    <td>
            <div class="icon-site"></div><h4 style="height:30px; width:auto; padding-top:5px;"><?=$fornecedor['for_site']?></h4>
         			</td>
               </tr>
            </table>
         </div>         
         
            
        </div>
    	<!-- FIM INFO CLIENTE -->
    
	</div>
</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<script type="text/javascript">
    function initialize() {
        var geocoder = new google.maps.Geocoder();
      var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
      var mapOptions = {
        zoom: 4,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        geocoder.geocode( { 'address': '<?php echo $fornecedor['for_endereco'].", ".utf8_encode($fornecedor['cid_dsc']).", ".utf8_encode($fornecedor['est_dsc'])?>' }, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(15);
            var marker = new google.maps.Marker({
                map: map,
                title: '<?=$fornecedor['for_dsc']?>',
                position: results[0].geometry.location
            });

            var string = '<h1><?=$fornecedor['for_dsc']?></h1>'+
            '<div><?php echo $fornecedor['for_endereco'].", ".utf8_encode($fornecedor['cid_dsc']).", ".utf8_encode($fornecedor['est_dsc'])?></div>'+
            '<div>+55 <?=$fornecedor['for_cel']?></div>'+
            '<div><?=$fornecedor['for_site']?></div>‎';

            var infowindow = new google.maps.InfoWindow({
              content: string
            });

            infowindow.open(map, marker);
          } else {
            alert("Address not found: " + status);
          }
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->

