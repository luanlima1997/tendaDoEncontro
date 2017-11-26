<?php 

session_start();

require_once ('Connections/EMP_config.php');
require_once ('Connections/EMP_job.php');

$EMP_db = Conexao::EMP_getInstance();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
$temp_category = $_REQUEST['category'];
$category = addslashes($temp_category);
if(!isset($_SESSION['category']))
die();
$cc = $_SESSION['category'];
$category = substr($category, 1);
if(strcmp($category,$cc)){
$EMP_result = EMP_selectAllWhere("categorys","categorys",$category, $EMP_db);
?>

<div class="cbp-loadMore-block1">
 <?php 
 $_SESSION['category'] = $category;
    $aux = 0;
foreach($EMP_result as $EMP_lineCategory) {
        $EMP_dir = "admin/pages/fotos/categorias/";
        $EMP_files = glob($EMP_dir.$EMP_lineCategory['categorys']."/*.*");
        ?>

            
<?php
$EMP_controller = 0;
for ($i=0; $i<count($EMP_files); $i++) {
    $EMP_ref[$i] = substr($EMP_files[$i],0,-4);
    $EMP_ref[$i] = substr(strrchr($EMP_ref[$i], "/"), 1);           
    $num = $EMP_files[$i];
    $EMP_controller += 1;
    if($EMP_controller > 9){
    ?>       
                                <li class="cbp-item <?php echo $EMP_lineCategory['categorys']?>">
                                    <figure>
                                        <img src="<?php echo $EMP_files[$i]?>" alt="">
                                        <figcaption>
                                            <a href="<?php echo $EMP_files[$i]?>" class="cbp-lightbox" data-title="Referência: <?php echo $EMP_ref[$i] ?>"><i class="fa fa-search fa-2x"></i></a>
                                        </figcaption>
                                    </figure>
                                </li>
       <?php
}
}
}
}
}
?>
 </div>
