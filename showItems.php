<?php    

$counter = 0;
// COUNTING THE ITEMS.
while($row = $result->fetch_assoc()){
        if(empty($category) && empty($location) && empty($searched))
            $counter++;
        elseif(empty($location) && !empty($category) && empty($searched) && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false)
            $counter++;
        elseif(empty($category) && !empty($location) && empty($searched) && strpos(strtolower($row["Location"]), strtolower($location)) !== false )
            $counter++;
        elseif(!empty($category) && !empty($location) && empty($searched) && strpos(strtolower($row["Location"]), strtolower($location)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false)
            $counter++;
        elseif(empty($category) && empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false)
            $counter++;
        elseif(!empty($category) && empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false) 
            $counter++;
        elseif(empty($category) && !empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["Location"]), strtolower($location)) !== false) 
            $counter++;
        elseif(!empty($category) && !empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["Location"]), strtolower($location)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false)
            $counter++;
}

if($totalItems != $counter){
    $totalItems = $counter;
    $totalPages = ceil($totalItems / $itemsPerPage);
}

$startItemIndex = ($currentPage-1) * ($itemsPerPage);
$counter = 0;
$index = -$startItemIndex;
$endItemIndex = $currentPage * $itemsPerPage;

$sql1 = "SELECT * FROM Items ORDER BY ID DESC";
$result1 = $conn->query($sql1);

// SHOWING THE ITEMS.
while($row = $result1->fetch_assoc()){
    if($counter < $totalItems && $counter < $itemsPerPage && $index >= 0)
    {
        if(empty($category) && empty($location) && empty($searched))
        { 
            include 'item.php';
            $counter++;
            $indexCounterState = 0;
        }
        elseif(empty($location) && !empty($category) && empty($searched) && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false){
            include 'item.php'; 
            $counter++;
            $indexCounterState = 1;
        }

        elseif(empty($category) && !empty($location) && empty($searched) && strpos(strtolower($row["Location"]), strtolower($location)) !== false ){
            include 'item.php';
            $counter++;
            $indexCounterState = 1;
        }

        
        elseif(!empty($category) && !empty($location) && empty($searched) && strpos(strtolower($row["Location"]), strtolower($location)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false){
            include 'item.php';
            $counter++;
            $indexCounterState = 1;
        }
      
        elseif(empty($category) && empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false){ 
            include 'item.php'; 
            $counter++;
            $indexCounterState = 1;
        }

        elseif(!empty($category) && empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false){ 
            include 'item.php'; 
            $counter++;
            $indexCounterState = 1;
        }

        elseif(empty($category) && !empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["Location"]), strtolower($location)) !== false){ 
            include 'item.php';
            $counter++; 
            $indexCounterState = 1;
        }

        elseif(!empty($category) && !empty($location) && !empty($searched) && strpos(strtolower($row["Descript"]), strtolower($searched)) !== false && strpos(strtolower($row["Location"]), strtolower($location)) !== false && strpos(strtolower($row["ItemName"]), strtolower($category)) !== false){
            include 'item.php';
            $counter++;
            $indexCounterState = 1;
        } 
    }
    $index++;
}

?>