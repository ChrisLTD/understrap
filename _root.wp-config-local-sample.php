<?php

define('DB_NAME',          'dev-db-name');
define('DB_USER',          'root');
define('DB_PASSWORD',      'root');
define('DB_HOST',          'localhost');
define('DB_CHARSET',       'utf8');
define('DB_COLLATE',       '');

// Generate new secrets: https://api.wordpress.org/secret-key/1.1/salt
define('AUTH_KEY',         'zQb+;<6;Rt[W:K#D|_em=)<Yoityz;NT|@1h<=kev8sB]otz0qR214}hPH^C`Ga');
define('SECURE_AUTH_KEY',  'zW`ZsByHl&Fn~x@x(<SEr35<y]M$zNi@Sc9%.@-qyYV[>d)nka=~{mk6~m$3;b{W');
define('LOGGED_IN_KEY',    'z:;+TI+9!}qK~Y?/ht*b,bOgij[6J$XcI%qx.n8UCU^`yz&{[A{RPMP_dap30o4c');
define('NONCE_KEY',        'zw#l:QC8-[0^KB+OfRR !%@S]2u~wIhCQB;IY1eVFRv}-vf~q@YjUq |8R-iobp3');
define('AUTH_SALT',        'zyI]Q|ZI$4A=Vt}8h~Y4F(|<<F3=2&evJL88Ga2BA04umt-HRWs*v;Jbco{tC^s-');
define('SECURE_AUTH_SALT', 'z#e6+V[+>t8>+MD|J3QA,iA-@G.rv&Ni!>L]= M-9}KJ]pJC|i4[,3yrb>X+M1B ');
define('LOGGED_IN_SALT',   'z^ttm(EFN}4ybo.gc/o DGGI&hG+{2}@$zXu)GMjU6qID`@bH]R!rD;Fk2#rEd$}');
define('NONCE_SALT',       'z/zc%,r>XhZDSR3mYXf`r}6+:W+k/8Qf0=QYf6W~{Gakhyk2|bR7gRT%s@xLm4)6');

$local_path = ':8888/project-directory-here/';
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . $local_path);
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . $local_path);

// Don't show deprecations; useful under PHP 5.5
error_reporting(E_ALL ^ E_DEPRECATED);

// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', false);