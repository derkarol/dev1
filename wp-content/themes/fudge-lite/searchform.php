<form method="get" class="searchform" action="<?php echo esc_url(home_url()); ?>">
    <input type="text" class="field" name="s" id="s" />
    <input type="submit" class="submit" name="submit" value="<?php esc_attr_e('search', 'fudge-lite'); ?>" />
</form>