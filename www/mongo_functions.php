
<?php

$m = new MongoClient('mongodb://mongodb:27017');
$db = $m->selectDB("produits");

$collection = $db->createCollection("produit_coll");
$collection = $db->selectCollection("produit_coll");



function insertProduit($produit) {
  try {
    $collection->insert($produit);
  } catch (Exception $e) {
		echo "Erreur dans l'insertion de $produit" ;
	}
}

function getProduits(){

}

function getProduit(){

}

?>
