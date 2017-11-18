<?php 

require_once ('EMP_config.php');

function EMP_selectAll($EMP_table, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('SELECT * FROM '.$EMP_table.'');
   $EMP_result->execute();
   $EMP_lines = $EMP_result->fetchAll(PDO::FETCH_ASSOC);
   		return $EMP_lines; 
} catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}

function EMP_select($EMP_column, $EMP_table, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('SELECT '.$EMP_column.' FROM '.$EMP_table.'');
   $EMP_result->execute();
   $EMP_lines = $EMP_result->fetchAll(PDO::FETCH_ASSOC);
   		return $EMP_lines; 
} catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}

function EMP_selectAllWhere($EMP_table, $EMP_where, $EMP_valuewhere, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('SELECT * FROM '.$EMP_table.' WHERE '.$EMP_where.' = :EMP_where');
   $EMP_result->bindParam(':EMP_where', $EMP_valuewhere);
   $EMP_result->execute();
   $EMP_lines = $EMP_result->fetchAll(PDO::FETCH_ASSOC);
         return $EMP_lines; 
} catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}

function EMP_update($EMP_column, $EMP_valuecolumn, $EMP_where, $EMP_valuewhere, $EMP_table, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('UPDATE '.$EMP_table.' SET '.$EMP_column.' = :EMP_column WHERE '.$EMP_where.' = :EMP_where');
   $EMP_result->bindParam(':EMP_column', $EMP_valuecolumn);
   $EMP_result->bindParam(':EMP_where', $EMP_valuewhere);
   $EMP_result->execute();
         return $EMP_result; 
} catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}

function EMP_updateAndInsert($EMP_column, $EMP_valuecolumn, $EMP_where, $EMP_valuewhere, $EMP_table, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('UPDATE '.$EMP_table.' SET '.$EMP_column.' = :EMP_column WHERE '.$EMP_where.' = :EMP_where');
   $EMP_result->bindParam(':EMP_column', $EMP_valuecolumn);
   $EMP_result->bindParam(':EMP_where', $EMP_valuewhere);
   $EMP_result->execute();
         return $EMP_result; 
} catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}

function EMP_delete($EMP_table, $EMP_where, $EMP_valuewhere, $EMP_db){

   $EMP_result = NULL;
   $EMP_lines = NULL;
try{
   $EMP_result = $EMP_db->prepare('DELETE FROM '.$EMP_table.' WHERE '.$EMP_where.' = :EMP_where');
   $EMP_result->bindParam(':EMP_where', $EMP_valuewhere);
   $EMP_result->execute();
 } catch (PDOException $ex) {
   echo 'ERRO: '.$ex->getMessage();
}
}


?>
