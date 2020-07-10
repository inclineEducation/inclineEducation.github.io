<style>
    th, td, table {
        border: 1px solid black;
        margin: auto;
        table-layout:fixed;
        word-wrap:break-word;
        
    }
</style>

<table style="width: 90%;">
    <tr>
    <?php
    foreach ($_SERVER as $key => $value){
        echo '<tr>';
        echo "<th style='text-align: left;'>$key:</th>";
        echo "<th>$value</th>";
        echo '</tr>';
    }
    ?>
