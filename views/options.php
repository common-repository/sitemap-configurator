<main class="sui-wrap">
    <div class="sui-header">
        <h1 class="sui-header-title"><?php _e( 'Sitemap Configurator', 'sitemap-configurator' ); ?></h1>
    </div>
    <div class="sui-box">
        <div class="sui-box-header">
            <!-- Box title with icon -->
            <h3 class="sui-box-title">
				<?php _e( 'Configure Your Sitemap', 'sitemap-configurator' ); ?>
            </h3>
        </div>
        <div class="sui-box-body">
            <form action="" method="POST" id="osc-options">
                <div class="sui-form-field">
                    <label for="post-sitemaps" class="sui-toggle">
                        <input
                                name="osc_options[enable_posts]"
                                type="checkbox"
                                id="post-sitemaps"
                                aria-labelledby="unique-id-label"
                                aria-describedby="unique-id-description"
							<?php echo $osc_options->get( 'enable_posts', false ) == true ? 'checked' : null; ?>
                                value="1"
                        />
                        <span class="sui-toggle-slider" aria-hidden="true"></span>
                        <span id="unique-id-label" class="sui-toggle-label"><?php printf(
                        /* translators: %s = Post */
                        __( 'Toggle %s sitemaps.', 'sitemap-configurator' ), __( 'Post', 'sitemap-configurator' )
                        ); ?></span>
                        <span id="unique-id-description" class="sui-description"><?php printf(
                        /* translators: %s = posts */
                        __( 'Show/hide the %s sitemap in the main sitemap index.', 'sitemap-configurator' ), __( 'posts', 'sitemap-configurator' )
                        ); ?></span>
                    </label>
                </div>
                <div class="sui-form-field">
                    <label for="page-sitemaps" class="sui-toggle">
                        <input
                                name="osc_options[enable_pages]"
                                type="checkbox"
                                id="page-sitemaps"
                                aria-labelledby="unique-id-label"
                                aria-describedby="unique-id-description"
							<?php echo $osc_options->get( 'enable_pages', false ) == true ? 'checked' : null; ?>
                                value="1"
                        />
                        <span class="sui-toggle-slider" aria-hidden="true"></span>
                        <span id="unique-id-label" class="sui-toggle-label"><?php printf(
                        /* translators: %s = Page */
                        __( 'Toggle %s sitemaps.', 'sitemap-configurator' ), __( 'Page', 'sitemap-configurator' )
                        ); ?></span>
                        <span id="unique-id-description" class="sui-description"><?php printf(
                        /* translators: %s = pages */
                        __( 'Show/hide the %s sitemap in the main sitemap index.', 'sitemap-configurator' ), __( 'pages', 'sitemap-configurator' )
                        ); ?></span>
                    </label>
                </div>
                <div class="sui-form-field">
                    <label for="user-sitemaps" class="sui-toggle">
                        <input
                                name="osc_options[enable_users]"
                                type="checkbox"
                                id="user-sitemaps"
                                aria-labelledby="unique-id-label"
                                aria-describedby="unique-id-description"
							<?php echo $osc_options->get( 'enable_users', false ) == true ? 'checked' : null; ?>
                                value="1"
                        />
                        <span class="sui-toggle-slider" aria-hidden="true"></span>
                        <span id="unique-id-label" class="sui-toggle-label"><?php printf(
                        /* translators: %s = User */
                        __( 'Toggle %s sitemaps.', 'sitemap-configurator' ), __( 'User', 'sitemap-configurator' )
                        ); ?></span>
                        <span id="unique-id-description" class="sui-description"><?php printf(
                        /* translators: %s = users */
                        __( 'Show/hide the %s sitemap in the main sitemap index.', 'sitemap-configurator' ), __( 'users', 'sitemap-configurator' )
                        ); ?></span>
                    </label>
                </div>
                <div class="sui-form-field">
                    <label for="tag-sitemaps" class="sui-toggle">
                        <input
                                name="osc_options[enable_tags]"
                                type="checkbox"
                                id="tag-sitemaps"
                                aria-labelledby="unique-id-label"
                                aria-describedby="unique-id-description"
							<?php echo $osc_options->get( 'enable_tags', false ) == true ? 'checked' : null; ?>
                                value="1"
                        />
                        <span class="sui-toggle-slider" aria-hidden="true"></span>
                        <span id="unique-id-label" class="sui-toggle-label"><?php printf(
                        /* translators: %s = Tag */
                        __( 'Toggle %s sitemaps.', 'sitemap-configurator' ), __( 'Tag', 'sitemap-configurator' )
                        ); ?></span>
                        <span id="unique-id-description" class="sui-description"><?php printf(
                        /* translators: %s = tags */
                        __( 'Show/hide the %s sitemap in the main sitemap index.', 'sitemap-configurator' ), __( 'tags', 'sitemap-configurator' )
                        ); ?></span>
                    </label>
                </div>
                <div class="sui-form-field">
                    <label for="category-sitemaps" class="sui-toggle">
                        <input
                                name="osc_options[enable_categories]"
                                type="checkbox"
                                id="category-sitemaps"
                                aria-labelledby="unique-id-label"
                                aria-describedby="unique-id-description"
							<?php echo $osc_options->get( 'enable_categories', false ) == true ? 'checked' : null; ?>
                                value="1"
                        />
                        <span class="sui-toggle-slider" aria-hidden="true"></span>
                        <span id="unique-id-label" class="sui-toggle-label"><?php printf(
                        /* translators: %s = Category */
                        __( 'Toggle %s sitemaps.', 'sitemap-configurator' ), __( 'Category', 'sitemap-configurator' )
                        ); ?></span>
                        <span id="unique-id-description" class="sui-description"><?php printf(
                        /* translators: %s = categories */
                        __( 'Show/hide the %s sitemap in the main sitemap index.', 'sitemap-configurator' ), __( 'categories', 'sitemap-configurator' )
                        ); ?></span>
                    </label>
                </div>
                <div class="sui-form-field">
                    <button type="submit" class="sui-button sui-button-green sui-button-lg"><?php _e( 'Save Settings', 'sitemap-configurator' ); ?></button>

                </div>
            </form>
            <div>
                <p><?php printf(
                /* translators: %s: Optimocha link */
                __( 'Made with ❤ by %s.', 'sitemap-configurator' ), '<a href="https://profiles.wordpress.org/optimocha/" target="_blank">Optimocha</a>'
                ); ?></p>
            </div>
        </div>
    </div>
    <div class="sui-floating-notices">
        <div role="alert"
             id="osc-options-updated"
             class="sui-notice"
             aria-live="assertive"
        >
			<?php _e( 'Options updated successfully.', 'sitemap-configurator' ) ?>
        </div>
    </div>
</main>