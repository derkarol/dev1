<div class="container">
    <h2><?php echo esc_html($fudge_lite_speakers_title); ?></h2>
    <p class="tagline"><?php echo esc_html($fudge_lite_speakers_tagline); ?></p>
    <div id="speakers-grid">
	<div id="all-speakers">
	</div>
    </div>
    <form autocomplete="off">
	<input type="hidden" id="cur_speakers_page" value="0" />
    </form>
    <a class="btn btn-less main-text-color" title="<?php echo(!empty($fudge_lite_speakers_less_text) ? esc_attr($fudge_lite_speakers_less_text) : __('View Less', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_speakers_less_text) ? esc_html($fudge_lite_speakers_less_text) : __('View Less', 'fudge-lite')); ?></a>
    <a class="btn btn-more main-text-color" title="<?php echo(!empty($fudge_lite_speakers_more_text) ? esc_attr($fudge_lite_speakers_more_text) : __('View More', 'fudge-lite')); ?>" href="#"><?php echo(!empty($fudge_lite_speakers_more_text) ? esc_html($fudge_lite_speakers_more_text) : __('View More', 'fudge-lite')); ?></a>
</div>
<div class="lightbox-container speaker-pop">
    <div class="lightbox"></div>
</div>