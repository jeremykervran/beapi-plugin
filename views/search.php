<?php

global $wp;
$current_url = get_home_url( null, $wp->request, null );

?>

<form role="search" method="get" action="<?php echo $current_url; ?>/">
   <label>
       <input <?php echo $_GET['type'] === 'offres' || !isset($_GET['type']) ? 'checked' : '' ?> type="radio" name="type" value="offres"/>
       Offres
   </label>
   <label>
       <input <?php echo $_GET['type'] === 'demandes' ? 'checked' : '' ?> type="radio" name="type" value="demandes"/>
       Demandes
   </label>

    <!-- Titre -->
<!--    <label>-->
<!--        <input type="text" name="titre" placeholder="Rechercher par titre"/>-->
<!--    </label>-->

    <!-- Region -->
    <label for="region">Région
        <select name="region" id="search-select-categorie">
        <option value="null">Sélectionnez une région...</option>
			<?php
			foreach ( get_terms( [ 'taxonomy' => 'region', 'hide_empty' => true ] ) as $region ) {
                $selected = '';

                if ( $region->slug === $_GET['region'] ) {
                    $selected = 'selected';
                }
				?>
                <option <?php echo $selected; ?> value="<?php echo esc_html( $region->slug ); ?>"><?php echo esc_html( $region->name ); ?></option>
				<?php
			}
			?>
        </select>
    </label>


    <!-- Catégorie -->
   <label for="categorie">Catégorie
       <select name="categorie" id="search-select-categorie">
            <option value="null">Sélectionnez une catégorie...</option>
			<?php
			foreach ( get_terms( [ 'taxonomy' => 'categorie', 'hide_empty' => false ] ) as $categorie ) {
                $selected = '';

                if ( $categorie->slug === $_GET['categorie'] ) {
                    $selected = 'selected';
                }
				?>
               <option <?php echo $selected; ?> value="<?php echo esc_html( $categorie->slug ); ?>"><?php echo esc_html( $categorie->name ); ?></option>
				<?php
			}
			?>
       </select>
   </label>

    <input value="Rechercher" type="submit">
</form>