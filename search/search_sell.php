<!DOCTYPE html>
<HTML>
    <?php 
    include('../conn.php') ;
    $dataOrd = $_POST['dataOrd'];
    $temp = explode('/', $dataOrd);
    $dataOrd = $temp[2]."-".$temp[0]."-".$temp[1];
    ?>
    <HEAD>
        <TITLE>VENDITE</TITLE>
    </HEAD>
    <BODY>
        <link href="../stile.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <div class="main">
            <div class="header">
                <form action="../index.html" target="_self">
                <div class="title">Gestione magazzino</div>
                <input name="HomePage" type="image" src="../img/homepage.png" alt="HomePage" title="HomePage" width="50px" height="50px">
                </form>
            </div>
            <div class="content">
                <div class="col1">
                    <div class="subtitle">Anagrafica</div>
                    <div class="subtitle2">
                    <button class="button" onclick="location.href='../client.php'">Clienti</button>
                    <br><br>
                    <button class="button" onclick="location.href='../stockist.php'">Fornitori</button>
                    </div>
                </div>
                <div class="col3">
                    <div class="subtitle">Prodotti</div>
                    <div class="subtitle2">
                    <button class="button" onclick="location.href='../store.php'">Magazzino</button>
                    <br><br>
                    <button class="button" onclick="location.href='../buy.php'">Acquisti</button>
                    <br><br>
                    <button class="button" onclick="location.href='../sell.php'">Vendite</button>
                    <br><br>
                    <button class="button" onclick="location.href='../bill.php'">Fatture</button>
                    </div>
                </div>
                <div class="col2">
                    <div class="pulsanti">
                    <form id="pulsante" action="#">
                    <input type="button" name="submit" value="Aggiungi vendita" onclick="location.href='../add/add_sell.php'">
                    <input type="button" name="submit" value="Fattura vendita" onclick="location.href='bill_search_sell.php?dataOrd=<?php echo $dataOrd; ?>'">
                    <input type="button" name="submit" value="Vedi vendita" onclick="location.href='../look/look_search_sell.php?dataOrd=<?php echo $dataOrd; ?>'">
                    </form>
                    <form id="cerca" method="POST" action="search_sell.php">
                    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                    <link rel="stylesheet" href="/resources/demos/style.css">
                    <script>
                    $(function() {
                    $( "#datepicker" ).datepicker();
                    });
                    </script>     
                    <input type="text" name="dataOrd" placeholder="Inserire data vendita" id="datepicker"/>
                    <input type="submit" name="submit" value="Cerca vendita">
                    </form>
                    </div>
                    <table border="1px" align="center" width="900px">
                        <tr id="headerriga" align="center">
                            <th id="headertableft"><font width="78px" color="white">ID Ordine</font></th>
                            <th id="headertab"><font width="208px" color="white">Data Ordine</font></th>
                            <th id="headertab"><font width="208px" color="white">Fattura</font></th>
                            <th id="headertab"><font width="143px" color="white">Data Fattura</font></th>
                            <th id="headertab"><font width="260px" color="white">ID Cliente</font></th>
                            <th id="headertabright"><font width="78px" color="white">Costo totale</font></th>
                        </tr>
                    <?php
                    $query="SELECT * FROM ordine_vendita WHERE data_v >= '".$dataOrd."'";
                    $risultati=mysql_query($query);
                    $num=mysql_num_rows($risultati);
                    $i=0;
                    while ($i < $num)
                    {
                        $idordinev[$i]=mysql_result($risultati,$i,"id_v");
                        $quantitaordinev[$i]=mysql_result($risultati,$i,"quantita_v");
                        $datav[$i]=mysql_result($risultati,$i,"data_v");
                        $fatturav[$i]=mysql_result($risultati,$i,"fattura_v");
                        $datafatturav[$i]=mysql_result($risultati,$i,"data_fattura_v");
                        $idcliente[$i]=mysql_result($risultati,$i,"id_c");
                        echo "<tr align='center' bgcolor='#FFFFFF' id='riga-$num'>";
                        echo "<td>".$idordinev[$i]."</td>";
                        echo "<td>".$datav[$i]."</td>";
                        echo "<td>".$fatturav[$i]."</td>";
                        echo "<td>".$datafatturav[$i]."</td>";
                        echo "<td>".$idcliente[$i]."</td>";
                        echo "<td>".$quantitaordinev[$i]."</td>";
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                    </table>
                </div>
            </div>
            <div class="copy"><small>Design by <a href="#" title="#">Salvatore Gangemi</a></small></p></div>
        </div>
    </BODY>
</HTML>