<?php
/**
 * Title: Search
 * Slug: cyber-security-blocks/search
 * Categories: cyber-security-blocks, search
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>","id":6,"dimRatio":80,"minHeight":300,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-6" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:query-title {"type":"search","textAlign":"center","style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"letterSpacing":"1px"}},"fontSize":"gigantic"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:query {"queryId":46,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"2em","bottom":"2em","left":"2em","right":"2em"}},"border":{"width":"1px","style":"dashed","color":"#111111","radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#111111;border-style:dashed;border-width:1px;border-radius:10px;padding-top:2em;padding-right:2em;padding-bottom:2em;padding-left:2em"><!-- wp:post-featured-image {"isLink":true} /-->

<!-- wp:post-title {"isLink":true} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"medium"} /-->

<!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous {"fontSize":"small"} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"fontSize":"small"} /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results.","style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
<p class="has-text-align-center has-heading-color has-text-color has-link-color"><?php esc_html_e('It seems we can’t find what you’re looking for. Perhaps searching can help.','cyber-security-blocks'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"search here","buttonText":"Search"} /-->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:group {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"fontSize":"medium"} -->
<div class="wp-block-group has-secondary-color has-text-color has-link-color has-medium-font-size" style="font-style:normal;font-weight:700"><!-- wp:post-navigation-link {"type":"previous"} /-->

<!-- wp:post-navigation-link /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:template-part {"slug":"sidebar","theme":"cyber-security-blocks","tagName":"div","area":"uncategorized"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->