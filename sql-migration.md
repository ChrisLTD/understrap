UPDATE wp_options SET option_value = replace( option_value, 'http://localhost:8888/SITEPATH', 'http://production.com/SITEPATH' );
UPDATE wp_posts SET guid = replace( guid, 'http://localhost:8888/SITEPATH/', 'http://production.com/SITEPATH/' );
UPDATE wp_posts SET post_content = replace( post_content, 'http://localhost:8888/SITEPATH/', 'http://production.com/SITEPATH/' );
UPDATE wp_postmeta SET meta_value = replace( meta_value, 'http://localhost:8888/SITEPATH/', 'http://production.com/SITEPATH/' );
