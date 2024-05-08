<?php

    class Counter {
        public $tasbih = 0;
        public $quran = "Juz 1 Hezb 1";


        public function generateGrid() {
            // Define total number of boxes
            $total_boxes = 60;
    
            // Start generating the HTML
            $html = "<div class='grid'>";
    
            // Loop to generate boxes
            $i = 1;
            for ($j = 1; $j <= $total_boxes; $j++) {
                $value = "Juz " . (int)$i . " Hezb " . $j ; // Change the range as needed
                $i += 0.5;
    
                // Check if the value matches the saved value
                if (isset($this->quran) && $value == $this->quran) {
                    $html .= "<div class='selectedbox box' data-value='$value' onclick='selectBox(this)'>$value</div>";
                } else {
                    $html .= "<div class='box' data-value='$value' onclick='selectBox(this)'>$value</div>";
                }
            }
    
            // Close the grid div
            $html .= "</div>";
    
            // Output the generated HTML
            echo $html;
        }

        public function handleFormSubmission() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['valueToSave'])) {
                    $valueToSave = $_POST['valueToSave'];
                    $this->quran = $valueToSave;
                } else {
                    echo "Error: Value not received.";
                }
            }
        }

        public function generateTasbihCounter() {
            echo "<div class = 'tasbih'>";
            echo "Tasbih Counter: <span id='tasbihCounter'>" . $this->tasbih . "</span><br><br>";
            echo "<button onclick='incrementTasbih()'>Increment</button>";
            echo "<button onclick='resetTasbih()'>Reset</button><br><br>";
            echo "Dropdown List: ";
            echo "<select id='dropdownList' onchange='changeValue()'>";
            echo "<option value='value1'>سبحان الله و بحمده سبحان الله العظيم</option>";
            echo "<option value='value2'>الحمدلله</option>";
            echo "<option value='value3'>أستغفر الله</option>";
            echo "</select>";
            echo "</div>";

            $script = "
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
                element.classList.toggle('selected');
            }
            function saveProgress() {
                var selectedBox = document.querySelector('.box.selected');
                if (selectedBox) {
                    var selectedValue = selectedBox.dataset.value;
                    document.getElementById('valueToSave').value = selectedValue;
                    document.getElementById('saveForm').submit();
                } else {
                    alert('No box selected.');
                }
            }
        
            function incrementTasbih() {
                var counterElement = document.getElementById('tasbihCounter');
                var currentCount = parseInt(counterElement.innerText);
                counterElement.innerText = currentCount + 1;
            }
        
            function resetTasbih() {
                document.getElementById('tasbihCounter').innerText = 0;
            }
        
            function changeValue() {
                var dropdown = document.getElementById('dropdownList');
                var selectedValue = dropdown.options[dropdown.selectedIndex].value;
                console.log('Selected value: ' + selectedValue);
                // You can add your logic here to handle the selected value
            }
        </script>
            ";

        echo $script;
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
        width: 25%;
        display: grid;
        grid-template-columns: repeat(6, 1fr); /* 6 columns */
        grid-auto-rows: 50px;
        grid-gap: 0.5em;
    }
    .box {
        width: 75px;
        height: 50px;
        background-color: lightgray;
        border: 1px solid gray;
        display: flex;
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

    .tasbih {
        position: fixed;
        background-color: green;
        right: 0;
        top: 70px;
    }
</style>
</head>
<body>
    <?php include "header.php" ?>

<body>

<?php
// Create a Counter instance with tasbih and quran properties
$counter = new Counter;
$counter->handleFormSubmission();
// Generate the grid using the Counter class method
$counter->generateGrid();
$counter->generateTasbihCounter();
?>

<form id="saveForm" action="counter.php" method="post">
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

    function incrementTasbih() {
        var counterElement = document.getElementById("tasbihCounter");
        var currentCount = parseInt(counterElement.innerText);
        counterElement.innerText = currentCount + 1;
    }

    function resetTasbih() {
        document.getElementById("tasbihCounter").innerText = 0;
    }

    function changeValue() {
        var dropdown = document.getElementById("dropdownList");
        var selectedValue = dropdown.options[dropdown.selectedIndex].value;
        console.log("Selected value: " + selectedValue);
        // You can add your logic here to handle the selected value
    }
</script>
</body>
</html>