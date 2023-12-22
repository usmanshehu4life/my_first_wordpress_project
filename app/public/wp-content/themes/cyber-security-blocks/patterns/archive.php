<?php
/**
 * Title: Archives
 * Slug: cyber-security-blocks/archive
 * Categories: cyber-security-blocks, archive
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>","id":19,"dimRatio":50,"minHeight":300,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-19" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:query-title {"type":"archive","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"white"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"40px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:40px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:query {"queryId":10,"query":{"perPage":"10","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"2em","right":"2em","bottom":"2em","left":"2em"}},"border":{"style":"dashed","width":"1px","color":"#111111","radius":"10px"}},"backgroundColor":"section-bg","className":"lite-shadow","layout":{"type":"default"}} -->
<div class="wp-block-group lite-shadow has-border-color has-section-bg-background-color has-background" style="border-color:#111111;border-style:dashed;border-width:1px;border-radius:10px;padding-top:2em;padding-right:2em;padding-bottom:2em;padding-left:2em"><!-- wp:post-featured-image /-->

<!-- wp:post-title {"textAlign":"left"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"medium"} /-->

<!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":""} /-->

<!-- wp:read-more {"content":"Read More","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center"},"fontSize":"medium"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Sorry, no post exist...','cyber-security-blocks'); ?></h3>
<!-- /wp:heading -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:template-part {"slug":"sidebar","theme":"cyber-security-blocks","tagName":"div","area":"uncategorized"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->