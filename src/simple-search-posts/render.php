<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

wp_enqueue_script('wp-api-fetch');

$context = array(
	'results' => array(),
	'searching' => false,
	'keyword' => '',
);
?>

<div
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive="simple-search-posts"
	data-wp-watch="callbacks.searchCallback"
	<?php echo wp_interactivity_data_wp_context( $context ); ?>
>
	<div class="wrapper">
		<input type="text" placeholder="Search posts..." data-wp-on--keyup="actions.searching">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
	</div>
	<small data-wp-bind--hidden="!context.searching"><span data-wp-text="context.count"></span> results</small>

	<ul class="results" data-wp-bind--hidden="!context.searching">
		<template data-wp-each="context.results">
			<li>
				<a data-wp-bind--href="context.item.guid.rendered" target="_blank">
					<span data-wp-text="context.item.title.rendered"></span>
				</a>
			</li>	
		</template>
	</ul>
</div>
