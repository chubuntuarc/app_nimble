<?php
  require_once '../app_nimble/data/conection.php';
class Ticket{
  const Table = 'tickets';
  
  //Search all ticket values
   public static function getAllOpens(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT t.id,t.id_client as user,t.id_ticket,start_time,c.first_name,c.last_name,d.department_name,m.message,(SELECT d.department_name FROM clients c LEFT JOIN departments d ON d.id_department = c.id_department WHERE c.id_client = user) as dept FROM ' . self::Table . ' t LEFT JOIN clients c ON t.id_client = c.id_client LEFT JOIN departments d ON t.id_department = d.id_department LEFT JOIN ticket_messages m ON t.id = m.id_ticket WHERE t.status = 1 GROUP BY t.id_ticket ORDER BY t.id_ticket DESC');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
}
?>