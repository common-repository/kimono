<div class="wrap">

    <h2><a href="http://www.kimonolabs.com/"><img src="<?=WP_PLUGIN_URL?>/kimono/kimono.svg" width="348" height="64"></a></h2>

    <p>
        Set the default Kimono shortcode style options.
        These values can be overriden with parameters in your shortcode or oembed URL. 
        See <a href="http://kimonolabs.com/learn/wordpress">Wordpress Docs on Kimono Labs</a> to learn more.
    </p>

    <form method="post" action="options.php"> 
        <?php @settings_fields('kimono'); ?>
        <?php @do_settings_fields('kimono'); ?>
        <?php @do_settings_sections('kimono'); ?>
        <?php @submit_button(); ?>
    </form>
</div>