<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

define( 'WP_DEFAULT_THEME', 'disposable-theme' );

define( 'WP_DEFAULT_TITLE', 'Prebuild Wordpress' );

define( 'WP_DEFAULT_USERNAME', 'sylvain@seeyoucloud.com' );


define( 'WP_DEFAULT_DBADR', 'localhost' );
// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'SYCWordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'stewitap');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'O??SObtFYndF_:W!LMraGL=[q/R+kX7|MS@nDjxENqh2YVwp(1AG#j}rR9mjU04b');
define('SECURE_AUTH_KEY',  'WyvZM{)_I6QC9^FAhhZ]h=A4,<$D;4ACks:m/-DB!M]BmUsY?nM]J[+Yccg=x|}f');
define('LOGGED_IN_KEY',    'XZd]*sa&}Wuv,Jk0/JBetxpJLf;FO7T}`q?&MUiQgThc#WM`0J,RqU}x)=9VM,E!');
define('NONCE_KEY',        ')qB<tcosrj5Sv76k~*RBuk8ski2y}]-v{mi;&?{YBaIG]Fi>;E:2sJc44^nONEw1');
define('AUTH_SALT',        '7 &4k}XfGg0u$o:15rf9^kt|[Ig/[mR}#fb.IU[Mu(%|Sm9,tx$3,E1/^2G+4m^+');
define('SECURE_AUTH_SALT', 'HN~AGb)QF$z4HisGTAIS1}Sl$BK=l<hfN iV>2yQkv+tQ<:bR8~QA4P(!{153n*V');
define('LOGGED_IN_SALT',   'cjb,g`D2m_HTamvP.Z}|1vYx5LhruQBn$tt_yRY2y:4jF=iJbg<DEFQ2IeA_TE=S');
define('NONCE_SALT',       '+%=td@eKX(Sy%U)gElz<@yu_<ke+h&rbQpDx+I2$etXzyY,rAo.Pu!XY]d.:x-5G');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
