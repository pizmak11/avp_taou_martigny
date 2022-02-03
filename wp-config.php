<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', "avp_taou_martigny" );


/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', "root" );


/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', "" );


/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', "localhost" );


/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );


/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'KJ.EvVmaMGs!C><5.VHA@eOJO&.)*6Ry73ziq+f+5OYG~MKqjj1TP#;e(6U Ln_%' );

define( 'SECURE_AUTH_KEY',  '+{TwM=r0eue}nSkgoW57@Y0sVi9lg;X~4[gJF|VHhS;;LX_0bHQ<YD%Fq(Yx0TA~' );

define( 'LOGGED_IN_KEY',    'Fzhpn{&t^QU$(6U+?bxXem&#p#db,iOY8y;/ic4h,[a[`p3X.@M+W|YE*f61[#M2' );

define( 'NONCE_KEY',        'l ^8mwZtA/y!L&x!I_~#K:WHkM_Km=KB4J`9.NaF<4.n8ZF!n3e4Eo`Nba,jzI!9' );

define( 'AUTH_SALT',        'i5W^$&d3%xHw17I[CoeB-6smwtx0O?xo>nA!S~Ry0eM*b$S2yOEi@jTLK?P^9e$>' );

define( 'SECURE_AUTH_SALT', 'f=MS4Bj_cFh`MVh.K^,-@a**h)5ky*4^kjID]z_)72hP)oB1xb1JBsuqp?D&Ywya' );

define( 'LOGGED_IN_SALT',   'IY[*RwSqfTx{=!; .S{}P5XKf3ro!+(Y`PV)|]([d#?Aes%lOD|GQC~EDn9FG?><' );

define( 'NONCE_SALT',       'PVV_sP.[PYP?[s]& *q/cI|E8*2Lu7@ohVq(y3^zepE#bM!sm8k:0E>r?wUO,KbB' );

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';


/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
