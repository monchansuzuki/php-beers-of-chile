# Site de la librairie Comtes d'ici et d'ailleurs

Un barême indicatif est présent dans le fichier `barême.png`.

Le site qui vous est remis contient 3 pages :
* Une page d'accueil (fichier `index.php`)
* Une page présentant les livres de la boutique (au nombre de 4 présentement) (fichier `catalogue.php`)
* Une page de formulaire de contact (fichier `contact.php`)

Vous devrez :

* Mettre en place un menu sur toutes les pages
* Afficher des livres de la boutique
* Traiter le formulaire de contact

## Réalisation du menu

Editez le fichier ```page_top.php``` : 

1. Incluez le fichier ```data/data.php```. Il contient la variable $menu_items de définition du menu.
2. Dans la balise ul.menu, parcourez chaque élément du tableau $menu_items. Produisez le même code HTML que dans `markup_menu.png`.

## Réalisation du catalogue

Editez le fichier `catalogue.php`:

3. Incluez le fichier ```data/data.php```. Il contient la variable $livres de la liste des livres.
4. Dans la balise ul.catalog_items, parcourez chaque élément du tableau $livres. Produisez le même code HTML que dans `markup_catalogue_livres.png`.

## Formulaire de Contact

### Réception des données POST et validation

Le formulaire de contact est un formulaire POST et sa validation est faite dans le même fichier que le formulaire (postback).

Editez le fichier `contact.php`:

5.  Pour facilier la validation, vous pouvez déclarer les variables suivantes en début de fichier :
```php
// Les "variables" de validation pour chaque champ
$nom_val = null;
$nom_est_valide = false;
$nom_err_msg = 'Le nom doit contenir au moins 2 caractères.';

$courriel_val = null;
$courriel_est_valide = false;
$courriel_err_msg = 'Le courriel est absent ou n\'est pas valide.';

$message_val = null;
$message_est_valide = false;
$message_err_msg = 'Le message doit contenir au moins 10 caractères.';

$raison_val = null;
$raison_est_valide = false;
$raison_err_msg = 'La raison n\'est pas choisie.';
```
6. Définissez une variable `$en_reception` qui indique que le script est appelé en POST et que la variable $_POST contient les 3 clefs suivantes : FN_NOM, FN_COURRIEL et FN_MESSAGE (ne pas vérifier la présence de la clef FN_RAISON car elle peut être absente des données POST).

7. **Si le script est en réception** (```if ($en_reception) {...}```) faites la validation de chaque champ :
	* Le nom doit contenir au minimum **2 caractères** après :
		*  filtrage par **FILTER_SANITIZE_STRING**
		*  puis supression des **caractères blancs** (`trim()`)
		
		Si le champ n'est pas valide, le message d'erreur sera : 
	> Le nom doit contenir au moins 2 caractères.
	* Le courriel doit être un courriel valide (utiliser FILTER_VALIDATE_EMAIL). Si le champ n'est pas valide, le message d'erreur sera : 
	> Le courriel est absent ou n'est pas valide.
 	* Le message doit être au minimum de 10 caractères après avoir été passé au filtre FILTER_SANITIZE_STRING.  Si le champ n'est pas valide, le message d'erreur sera : 
 	> Le message doit contenir au moins 10 caractères.
 	* Une valeur de raison doit être sélectionnée.  Si le champ n'est pas valide, le message d'erreur sera :
 	> La raison n'est pas choisie.
 	
8. À la fin du ```if ($en_reception) {...}```, si l'ensemble des 4 champs est valide, alors **redirigez** l'utilisateur vers la page index.php.


### Ré-affichage du formulaire

Pour le réaffichage du formulaire il faut :
 remettre les valeur

9. Pour les champs `FN_NOM`, `FN_COURRIEL` et `FN_MESSAGE`, remettre la valeur POST reçue dans l'attribut `value` des champs correspondants.
10. Pour le champ `FN_RAISON` (inputs de type radio), mettre l'attribut checked à l'input qui a été coché. Aidez-vous par exemple du code suivant pour le premier input : 
```
<input type="radio" name="<?= FN_RAISON ?>" id="r_renc" value="r_renc" <?= ('r_renc' == $raison_val) ? ATTR_CHECKED : '' ?> /><label for="r_renc">Nous rencontrer</label>
```
11. Pour chacun des 4 champs, si on est en réception **et** que le champ **n'** est **pas** valide, alors afficher un `<span class="error_case"></span>` avec le message d'erreur de validation à l'intérieur.

FIN