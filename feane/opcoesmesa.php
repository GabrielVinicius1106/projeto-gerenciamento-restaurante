<link rel="stylesheet" type="text/css" href="dist/css/elisson.css" />

<?php
    include("php/funcoes.php");
    $id1 = $_GET['id'];


?>
<h1>Mesa <?php echo $id1 ?></h1>
<div class="container">
<p class="p1">Capacidade : <input type="text" value = "<?php echo carregaCapacidade($_GET['id']) ?>"></p>
<p class="p2">Ocupação : <select name="nOcup">
                                <option value="op1">1</option>
                                <option value="op2">2</option>
                                <option value="op3">3</option>
                                <option value="op4">4</option>
                                <option value="op5">5</option>
                                <option value="op6">6</option>
                                <option value="op7">7</option>
                                <option value="op8">8</option>
                                <option value="op9">9</option>
                                <option value="op10">10</option>
                            </select>
    </p>
    </div>