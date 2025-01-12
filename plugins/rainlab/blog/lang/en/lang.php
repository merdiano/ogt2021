<?php return [
    'plugin' => [
        'name' => 'OGT',
        'description' => '',
    ],
    'blog' => [
        'menu_label' => 'OGT',
        'menu_description' => 'Manage OGT Posts',
        'posts' => 'Posts',
        'create_post' => 'OGT post',
        'categories' => 'Events',
        'create_category' => 'OGT event',
        'tab' => 'Blog',
        'access_posts' => 'Manage the posts',
        'access_categories' => 'Manage the events',
        'access_other_posts' => 'Manage other users posts',
        'access_import_export' => 'Allowed to import and export posts',
        'access_publish' => 'Allowed to publish posts',
        'manage_settings' => 'Manage settings',
        'delete_confirm' => 'Are you sure?',
        'chart_published' => 'Published',
        'chart_drafts' => 'Drafts',
        'chart_total' => 'Total',
        'settings_description' => 'Manage settings',
        'show_all_posts_label' => 'Show all posts to backend users',
        'show_all_posts_comment' => 'Display both published and unpublished posts on the frontend to backend users',
        'tab_general' => 'General',
    ],
    'posts' => [
        'list_title' => 'Manage the posts',
        'filter_category' => 'Event',
        'filter_published' => 'Published',
        'filter_date' => 'Date',
        'new_post' => 'New post',
        'export_post' => 'Export posts',
        'import_post' => 'Import posts',
    ],
    'post' => [
        'title' => 'Title',
        'title_placeholder' => 'New post title',
        'content' => 'Content',
        'content_html' => 'HTML Content',
        'slug' => 'Slug',
        'slug_placeholder' => 'new-post-slug',
        'categories' => 'Events',
        'author_email' => 'Author Email',
        'created' => 'Created',
        'created_date' => 'Created date',
        'updated' => 'Updated',
        'updated_date' => 'Updated date',
        'published' => 'Published',
        'published_by' => 'Published by',
        'current_user' => 'Current user',
        'published_date' => 'Published date',
        'published_validation' => 'Please specify the published date',
        'tab_edit' => 'Edit',
        'tab_categories' => 'Events',
        'categories_comment' => 'Select Events the post belongs to',
        'categories_placeholder' => 'There are no Events, you should create one first!',
        'tab_manage' => 'Manage',
        'published_on' => 'Published on',
        'excerpt' => 'Excerpt',
        'summary' => 'Summary',
        'featured_images' => 'Featured Images',
        'delete_confirm' => 'Delete this post?',
        'delete_success' => 'Successfully deleted those posts.',
        'close_confirm' => 'The post is not saved.',
        'return_to_posts' => 'Return to posts list',
        'posted_byline' => 'Posted in :categories on :date.',
        'posted_byline_no_categories' => 'Posted on :date.',
        'date_format' => 'M d, Y',
    ],
    'categories' => [
        'list_title' => 'Manage the events',
        'new_category' => 'New event',
        'uncategorized' => 'Uncategorized',
    ],
    'category' => [
        'name' => 'Name',
        'name_placeholder' => 'New event name',
        'description' => 'Description',
        'slug' => 'Slug',
        'slug_placeholder' => 'new-event-slug',
        'posts' => 'Posts',
        'delete_confirm' => 'Delete this event?',
        'delete_success' => 'Successfully deleted those events.',
        'return_to_categories' => 'Return to the event list',
        'reorder' => 'Reorder events',
    ],
    'menuitem' => [
        'blog_category' => 'OGT event',
        'all_blog_categories' => 'All events',
        'blog_post' => 'OGT post',
        'all_blog_posts' => 'All posts',
        'category_blog_posts' => 'OGT event posts',
    ],
    'settings' => [
        'category_title' => 'Event List',
        'category_description' => 'Displays a list of events on the page.',
        'category_slug' => 'Event slug',
        'category_slug_description' => 'Look up the event using the supplied slug value. This property is used by the default component partial for marking the currently active event.',
        'category_display_empty' => 'Display empty events',
        'category_display_empty_description' => 'Show events that do not have any posts.',
        'category_page' => 'Event page',
        'category_page_description' => 'Name of the event page file for the event links. This property is used by the default component partial.',
        'post_title' => 'Post',
        'post_description' => 'Displays a post on the page.',
        'post_slug' => 'Post slug',
        'post_slug_description' => 'Look up the post using the supplied slug value.',
        'post_category' => 'Event page',
        'post_category_description' => 'Name of the event page file for the event links. This property is used by the default component partial.',
        'posts_title' => 'Post List',
        'posts_description' => 'Displays a list of latest posts on the page.',
        'posts_pagination' => 'Page number',
        'posts_pagination_description' => 'This value is used to determine what page the user is on.',
        'posts_filter' => 'Event filter',
        'posts_filter_description' => 'Enter a event slug or URL parameter to filter the posts by. Leave empty to show all posts.',
        'posts_per_page' => 'Posts per page',
        'posts_per_page_validation' => 'Invalid format of the posts per page value',
        'posts_no_posts' => 'No posts message',
        'posts_no_posts_description' => 'Message to display in the post list in case if there are no posts. This property is used by the default component partial.',
        'posts_no_posts_default' => 'No posts found',
        'posts_order' => 'Post order',
        'posts_order_description' => 'Attribute on which the posts should be ordered',
        'posts_category' => 'Event page',
        'posts_event_description' => 'Name of the category page file for the "Posted into" event links. This property is used by the default component partial.',
        'posts_post' => 'Post page',
        'posts_post_description' => 'Name of the post page file for the "Learn more" links. This property is used by the default component partial.',
        'posts_except_post' => 'Except post',
        'posts_except_post_description' => 'Enter ID/URL or variable with post ID/URL you want to exclude. You may use a comma-separated list to specify multiple posts.',
        'posts_except_post_validation' => 'Post exceptions must be a single slug or ID, or a comma-separated list of slugs and IDs',
        'posts_except_categories' => 'Except events',
        'posts_except_categories_description' => 'Enter a comma-separated list of event slugs or variable with such a list of events you want to exclude',
        'posts_except_categories_validation' => 'Event exceptions must be a single event slug, or a comma-separated list of slugs',
        'rssfeed_blog' => 'OGT page',
        'rssfeed_blog_description' => 'Name of the main page file for generating links. This property is used by the default component partial.',
        'rssfeed_title' => 'RSS Feed',
        'rssfeed_description' => 'Generates an RSS feed containing posts.',
        'group_links' => 'Links',
        'group_exceptions' => 'Exceptions',
    ],
    'sorting' => [
        'title_asc' => 'Title (ascending)',
        'title_desc' => 'Title (descending)',
        'created_asc' => 'Created (ascending)',
        'created_desc' => 'Created (descending)',
        'updated_asc' => 'Updated (ascending)',
        'updated_desc' => 'Updated (descending)',
        'published_asc' => 'Published (ascending)',
        'published_desc' => 'Published (descending)',
        'random' => 'Random',
    ],
    'import' => [
        'update_existing_label' => 'Update existing posts',
        'update_existing_comment' => 'Check this box to update posts that have exactly the same ID, title or slug.',
        'auto_create_categories_label' => 'Create events specified in the import file',
        'auto_create_categories_comment' => 'You should match the Categories column to use this feature, otherwise select the default events to use from the items below.',
        'categories_label' => 'Categories',
        'categories_comment' => 'Select the events that imported posts will belong to (optional).',
        'default_author_label' => 'Default post author (optional)',
        'default_author_comment' => 'The import will try to use an existing author if you match the Author Email column, otherwise the author specified above is used.',
        'default_author_placeholder' => '-- select author --',
    ],
    'spiker_count' => 'Spikers count',
    'name' => 'Name',
    'title' => 'Title',
    'bg_white' => 'White bg Image',
    'bg_blue_image' => 'Blue bg Image',
    'content' => 'Content',
    'event' => 'Event',
    'auditon' => 'Audition',
    'topic' => 'Topic',
    'session' => 'Session',
    'date' => 'Date',
    'time' => 'Time',
    'test' => 'Test',
    'order' => 'Order',
    'time_minute' => 'Duration(minutes)',
    'organization' => 'Organization name',
    'site' => 'Site',
];
