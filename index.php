<?php
require_once 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['valueToSave']))
    {
        $valueToSave = ($_POST['valueToSave']);
        echo "Received value: ";
        echo $valueToSave;

        
    }
    else {
        echo "Error: Values not received.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grid with Selectable Boxes</title>
<style>
    .grid {
        width:25%;
        display: grid;
        grid-template-columns: repeat(6, 1fr); /* 6 columns */
        grid-auto-rows:50px;
        grid-gap: 0.5em;
    }
    .box {
        width: 75px;
        height: 50px;
        background-color: lightgray;
        border: 1px solid gray;
        display: flex;
        /* /align-items: center; */
        justify-content: center;
        cursor: pointer;
    }
    .selectedbox {
        background-color: red; /* Background color for the saved value */
    color: white; /* Text color for better contrast */
    }
    .box.selected {
        background-color: lightblue;
    }
</style>
</head>
<body>
    <?php include "header.php" ?>

<body>

<div class="grid">
    <?php
    // Define total number of boxes
    $total_boxes = 60;

    // Loop to generate boxes
    $i = 1;
    for ($j = 1; $j <= $total_boxes; $j++) {

        $value = "Juz " . (int)$i . " Hezb " . $j ; // Change the range as needed
        $i += 0.5;
    if (isset($valueToSave)){
        if ($value == $valueToSave)
        echo "<div class='selectedbox box' data-value='$value' onclick='selectBox(this)'>$value</div>";
        else
        echo "<div class='box' data-value='$value' onclick='selectBox(this)'>$value</div>";
    }
    else{
        echo "<div class='box' data-value='$value' onclick='selectBox(this)'>$value</div>";
    }
    }
    ?>
</div>
<form id="saveForm" action="index.php" method="post">
    <input type="hidden" id="valueToSave" name="valueToSave">
    <button type="button" onclick="saveProgress()">Save Progress</button>
</form>
<script>
    function selectBox(element) {
        // Deselect all other boxes
        var boxes = document.querySelectorAll('.box');
        boxes.forEach(function(box) {
            if (box !== element) {
                box.classList.remove('selected');
            }
        });
        
        // Toggle selection on the clicked box
        element.classList.toggle("selected");
    }
    function saveProgress() {
        var selectedBox = document.querySelector(".box.selected");
        if (selectedBox) {
            var selectedValue = selectedBox.dataset.value;
            document.getElementById("valueToSave").value = selectedValue;
            document.getElementById("saveForm").submit();
        } else {
            alert("No box selected.");
        }
    }
</script>

</body>
</html>


    <?php include "footer.php" ?>
</body>
</html>
