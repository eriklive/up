<?php 
$conection = mysqli_query($link, "SELECT * FROM matriculas WHERE id = '1'");
$data = mysqli_fetch_assoc($conection);
?>
<div class="col m12">
    <!-- Stick Menu  -->
    <? include $_SERVER['DOCUMENT_ROOT']."/menus/menu-mobile.php";?>
    
    <!-- Barrinha do topo com o logo  -->
    <? include $_SERVER['DOCUMENT_ROOT']."/menus/barra-topo-mobile.php";?> 
    <? include $_SERVER['DOCUMENT_ROOT']."/menus/menu-desktop.php";?>
    <!--<div class="hide-on-large-only white navMenuMobile">
        <div class="bubbleback"></div>
        <div class="bubble white" data-activates="mobile-demo"></div>
        <div class="bubble-wrap">
            <div class="bar first"></div>
            <div class="bar second"></div>
            <div class="bar third"></div>
        </div>
        <ul class="menuAlterado white">
            <li class="menu-1"><a href="../home.php">Inicio</a></li>
            <li class="menu-2"><a href="../matriculas/" >Matriculas</a></li>          
            <li class="menu-3"><a href="../upload/">Enviar Arquivos</a></li>
            <li class="menu-4"><a href="https://docs.google.com/forms/d/e/1FAIpQLSe3Td7dti-mlsmwmTAYD-gNPpsmDiEJC3l9RDwpnFbGpAyLnA/viewform"target="_blank">Informar Erro</a></li>
            <?php //if ($_SESSION["user"]=="dce.ufabc") { 
                //echo '<li class="menu-5"><a href="../admin/" //>Dashboard</a></li>';
            //} else { 
               // echo '<li class="menu-5"><a href="../cadastro/alterarSenha.php">Conta</a></li>';
            //} ?>
            <br>         
            <li><div class="divider" style="margin-left:-15%;"></div></li>
            <li class="menu-5"><a href="../php/logout.php" class="red-text">Sair</a></li>
        </ul>
        <img src="../img/logo.png" class="responsive-img" style="height:55px; margin-left:40%; padding-top:4px;">
    </div>
    <div class="hide-on-large-only" style="height: 65px;"></div> -->
    
</div>
