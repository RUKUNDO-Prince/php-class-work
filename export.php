<?php
    if(isset($_POST["export_csv_data"])) {	
        $csv_file = "phpzag_csv_export_".date('Ymd') . ".csv";			
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$csv_file\"");	
        $fh = fopen( 'php://output', 'w' );
        $is_coloumn = true;
        if(!empty($records)) {
          foreach($records as $record) {
            if($is_coloumn) {		  	  
              fputcsv($fh, array_keys($record));
              $is_coloumn = false;
            }		
            fputcsv($fh, array_values($record));
          }
           fclose($fh);
        }
        exit;  
    }
?>