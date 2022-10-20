<?php 
include 'header.php';
?>
        <h1>Table De Commande</h1>
        <div class="contenair">
            <form action="exercice9.php" method="POST">
                <label for="num">Entrer un numéro de commande</label>
                <input type="number" name="numero">
                <input type="submit" name="submit" value="valider">
            </form>
        </div>
        <?php if(isset($_POST['numero']) && $_POST['numero'] > 0){
            require 'db.php';
            $numero = $_POST['numero'];
            $sql = "SELECT DISTINCT `idOrder`,`user`.`name` as `Client`, `product`.`price` as `prix`, `order`.`date` as `date`, `product`.`name` as `Article`  FROM `product` JOIN `order_has_product` ON  `order_has_product`.`Product_idProduct` = `idProduct` JOIN `order` ON `order`.`idOrder` = `order_has_product`.`Order_idOrder` JOIN `User` ON `user`.`idUser` = `Order`.`User_idUser` where `idOrder` = ".$numero."";
            $sql2 = "SELECT sum(`price` / 1.196) as `prix`, `order`.`date` as `date`, `order`.`idOrder` as `NumC`, `user`.`name` as `Client` FROM `product` JOIN `order_has_product` ON `order_has_product`.`Product_idProduct` = `idProduct` JOIN `order` ON `order`.`idOrder` = `order_has_product`.`Order_idOrder` JOIN `User` ON `user`.`idUser` = `Order`.`User_idUser` where `idOrder` = ".$numero." GROUP BY `Order_idOrder`";
            $req = $pdo->prepare($sql);  
            $req->execute();
            $datas = $req->fetchAll(PDO::FETCH_ASSOC);
            $req2 = $pdo->prepare($sql2);
            $req2->execute();
            $otherData = $req2->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
            <div class="col-md-12">   
 <div class="row ms-5">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width:     71px; border-radius: 43px;">
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><?php foreach($otherData as $oData){
                                echo $oData['Client'];
                            } ?> </h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>Facture N°:<?php foreach($otherData as $oData){
                                echo $oData['NumC'];
                            } ?></h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Détail de commande</th>
                            <th>Prix unitaire HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($datas as $data){
                        echo "<tr>";
                            echo "<td class='col-md-9'>".$data['Article']."</td>";
                            echo "<td class='col-md-3'>".round($data['prix'],2)."</td>";
                        echo "</tr>";

                        }
                        ?>
                        
                        
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total HT: </strong>
                            </p>
                            <p>
                                <strong>Total TVA: </strong>
                            </p>
							
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php foreach($otherData as $oData){
                                    echo round($oData['prix'], 2);
                                } ?></strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php foreach($otherData as $oData){
                                    echo round($oData['prix'] * 0.196, 2);
                                } ?> </strong>
                            </p>
							
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><?php foreach($otherData as $oData){
                                    echo round($oData['prix'] * 1.196,2);
                                } ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php foreach($otherData as $oData){
                                echo $oData['date'];
                            } ?></p>
							
						</div>
					</div>
					
				</div>
            </div>
			
        </div>    
	</div>
</div>
            <?php

            }else{
                echo "<h1 class='text-danger ms-5'>veuillez choisis un numéro de commande</h1>";
            }
           
         ?>      
            <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<?php
include 'footer.php';
?>