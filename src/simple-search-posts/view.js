/**
 * WordPress dependencies
 */
import { getContext, store } from '@wordpress/interactivity';
const apiFetch = window.wp.apiFetch;

const getPosts = async (keyword) => {
	return apiFetch({
		path: `/wp/v2/posts?search=${keyword}&per_page=10`,
		method: 'GET',
	});
}

store( 'simple-search-posts', {
	actions: {
		searching: async ( event ) => {
			const context = getContext();

			if(event.target.value.length < 2) {
				context.results = [];
				context.searching = false;
				return;
			}

			context.searching = true;

			context.keyword = event.target.value;
			const data = await getPosts(context.keyword);
			context.count = data.length;

			if(context.count == 0) {
				context.results = [];
				context.searching = false;
				return;
			} else {
				context.results = data;
			}
		},
	}
} );
