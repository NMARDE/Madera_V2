<?php
// importe le fichier
require('facturePDF.php');


// - - - - - - - - - - - - - - - - - - - - - - - - - 
//
// #1 initialise les informations de base
//
// adresse de l'entreprise qui émet la facture
$adresse = "K-soulé SA\n1 rue du Général Donk\n12321 Code Postal City\n\ncontact@general-zorg.fr\n(+33) 3 89 68 27 54";

// adresse du client
$client = "Robert Meinard\n3 place de Clichy\n88154 Nancy le port";

// pied de page
$piedPage1 = "K-soulé SA - 1 rue du Général Donk - 12321 Code Postal City - contact@general-zorg.fr - (+33) 3 89 68 27 54";
$piedPage2 = "Les produits livrés demeurent la propriété exclusive de notre entreprise jusqu'au paiement complet de la présente facture.";
$piedPage3 = "RCS : 245-532-578- NANCY / TVA Intracomunautaire : FR 02 4578 1455 5578 3254 / SIRET 887 547 259 974 125";

// initialise l'objet facturePDF
// gabarit : 	template['header']
//		template['client']
//		template['footer']
//
// le constructeur attend 3 paramètres :
//	- l'adresse de l'entreprise qui émet la facture
//	- l'adresse du client
//	- le pied de page
//
$pdf = new facturePDF($adresse, $client, $piedPage1."\n".$piedPage2."\n".$piedPage3);

// défini le logo avec setLogo()
// il suffit de passer l'adresse du logo en paramètre
// par défaut le logo est affiché dans le coin haut gauche.
// si vous voulez changer la position il faut utiliser les variables suivantes :
//	- $logoPosX : coordonnée sur X (abscisse)
//	- $logoPosY : coordonnée sur X (ordonnées)
//	- $logoWidth : largeur de l'image (en mm);
//
$pdf->setLogo('nature.png');

// entête des produits
// gabarit : template['productHead']
//
// l'entête des produits est une array() qui contient la liste des colonnes des produits.
// productHeaderAddRow() attend 3 paramètres :
//	- le titre de la colonne
//	- la largeur de la colonne
//	- l'alignement du texte
// la largeur et l'alignement seront utilisés pour chaque cellule appartenant à cette colonne
// vous pouvez ajouter autant de colonne que vous souhaitez.
// Les dimensions sont exprimé en millimètres.
//
$pdf->productHeaderAddRow('Produit', 75, 'L');
$pdf->productHeaderAddRow('Référence', 40, 'C');
$pdf->productHeaderAddRow('Prix HT', 25, 'C');
$pdf->productHeaderAddRow('QTE', 15, 'C');
$pdf->productHeaderAddRow('Prix HT', 25, 'R');

// entête des totaux
// gabarit : template['totalHead']
//
// idem que l'entête des produits, mais est utilisé pour le tableau qui contiendra les totaux.
// totalHeaderAddRow() attend 2 paramètres :
//	- la largeur de la colonne
//	- l'alignement du texte
//
$pdf->totalHeaderAddRow(40, 'L');
$pdf->totalHeaderAddRow(30, 'R');

// élément personnalisé
// gabarit : identifiant passé en paramètre
//
// ajoute des éléments personnalisé avec elementAdd()
// on passe 3 paramètre :
//	- le texte à afficher
//	- un identifiant qui sera utilisé dans le gabarit d'affichage
//	- la zone à laquelle sera rattaché cet élément ('header', 'content', 'footer')
//
$pdf->elementAdd('', 'traitEnteteProduit', 'content');
$pdf->elementAdd('', 'traitBas', 'footer');


// - - - - - - - - - - - - - - - - - - - - - - - - - 
//
// #2 Créer une facture
// gabarit :	template['infoFacture']
//		template['infoDate']
//		template['infoPage']
//
// initFacture() attend 3 paramètres :
//	- numéro de facture
//	- date
//	- texte affiché avant le numéro de page
//
$pdf->initFacture("Facture n° 555-911", "Paris le 21/03/2014", "Page ");

// produit
// gabarit : template['product']
//
// ajoute des lignes de produits avec la fonction productAdd()
// productAdd attend un array en paramètre. Cet array contient autant de valeurs que vous avez ajouté de colonnes avec productHeaderAddRow()
//
$pdf->productAdd(array('Attrape mouche collant', 'C22M9', '10.00', '7', '70.00'));
$pdf->productAdd(array('Attrape mouche collant CRAFT', 'C42M3', '5.00', '7', '35.00'));
$pdf->productAdd(array('Cylindre Honda ZX10R 125cc à carburateur injecté et intégration de cartouche NOS 2.6 vag-7', 'K345', '2.95', '1', '2.95'));
$pdf->productAdd(array('Baume du tigre rouge 3gr', 'BT45', '54.95', '1', '54.95'));
$pdf->productAdd(array('Batterie GoPro Hero 3 2044 mAh', 'SNCF', '0.99', '9', '9.91'));
$pdf->productAdd(array('Pack Pépito Super Promo Collector 25th anniversary', 'Gift-81', '37,00', '1', '37,00'));

// ligne des totaux
// gabarit : template['total']
//
// même principe que pour les lignes de produits.
// vous pouvez ajouter autant de ligne que vous souhaitez.
$pdf->totalAdd(array('Total HT', '59.95 EUR'));
$pdf->totalAdd(array('TVA', '10.99 EUR'));
$pdf->totalAdd(array('Sous total TTC', '71.94 EUR'));
$pdf->totalAdd(array('Livraison', '100.00 EUR'));
$pdf->totalAdd(array('Remise', '-5.94 EUR'));
$pdf->totalAdd(array('Total TTC', '165.00 EUR'));


// - - - - - - - - - - - - - - - - - - - - - - - - - 
//
// #3 Importe le gabarit
//
// pour la démo j'ai enregistré le gabarit dans un fichier externe
//
require('gabarit1.php');


// - - - - - - - - - - - - - - - - - - - - - - - - - 
//
// #4 Finalisation
//
// construit le PDF
//
$pdf->buildPDF();

// télécharge le fichier
//
// Output attend 2 paramètres. Le nom du fichier et le mode. 'I' permet d'afficher le fichier, 'D' permet de le télécharger.
// plus d'info à http://www.fpdf.org/fr/doc/output.htm
//
$pdf->Output('Facture.pdf', 'D');
?>