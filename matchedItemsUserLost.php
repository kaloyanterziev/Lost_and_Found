<?php
//Select any matched items, this user has lost and display them

  $matchedItems = 0;
  $sql = "SELECT * FROM Matched";
  $matchedResult = $conn->query($sql);


  while($matchedRow = $matchedResult->fetch_assoc())
  {
    if($matchedRow["MislayerID"] == $sessionId)
    {
      $sql = "SELECT ID, FinderID, ItemName, Descript, Location, Date FROM Items";
      $itemsResult = $conn->query($sql);

      while($row = $itemsResult->fetch_assoc())
      {
        if($row["ID"] == $matchedRow["ItemID"])
        {
          $displayId = $matchedRow["FinderID"];
          $sqlDisplay = "SELECT Name, isInstitution FROM Users WHERE ID = '$displayId'";
          $displayResult = $conn->query($sqlDisplay);
          $dRow = mysqli_fetch_assoc($displayResult);

          $matchedItems++;
          //update the number label of the item.

          include "showMatchedItemsUserLost.php";
        }//if
      }//while
    }//if
  }//while

  if($matchedItems == 0)
  {
    echo "You have no claimed items <br><br>";
  }//if 
?>
