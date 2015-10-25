<?php
				require $_SERVER['DOCUMENT_ROOT'] . '/e_commerce/sql/sql_connexion.php';
				$request = $bdd->prepare("SELECT * FROM basket WHERE user=? AND productId=?");
				$request->execute(array('admin@root.fr', 5));
				$quantity = $request->rowCount();
				$request->closeCursor();

				if ($quantity > 0) {
					echo 'TRUE';
				}

				echo  'FALSE';