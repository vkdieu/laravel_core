<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <section class="main-bg" data-inview-showup="showup-translate-up">
    <div class="container">
      <div class="contact-table only-xs-text-center">
        <div class="contact-icon xs-hidden"><i class="fas fa-plane" aria-hidden="true"></i></div>
        <div class="contact-content">
          <div class="contact-title"><?php echo e($title); ?></div>
          <div class="text-justify only-xs-text-justify-center"><?php echo e($brief); ?></div>
        </div>
        <?php if($url_link != ''): ?>
          <div class="contact-btn"><a href="<?php echo e($url_link); ?>"
              class="btn btns-white text-upper"><?php echo e($url_link_title); ?></a></div>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\maxdoor\resources\views/frontend/blocks/custom/styles/call_now.blade.php ENDPATH**/ ?>