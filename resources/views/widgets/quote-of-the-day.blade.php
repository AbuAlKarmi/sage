<?php

if(isset($post) && $post){
  $posts = [$post];
}
global $post;
?>
<section class="widget card mb-3">
  <div class="card-body">
    <h5 class="card-title text-center">
      {{$title}}
    </h5>
    <div class="body">

      @if(isset($posts) && count($posts))
        @foreach($posts as $post)
          <?php setup_postdata($post) ?>
            <a href="{{get_the_permalink()}}" class="text-decoration-none">
              {!! $quote !!}
            </a>

            <?php
            $shareText = get_the_title();
            $shareLink = urlencode(get_the_permalink());
            ?>



            <div class="heateor_sss_sharing_container heateor_sss_horizontal_sharing" ss-offset="0" heateor-sss-data-href="{{$shareLink}}">
              <ul class="heateor_sss_sharing_ul">
                <li class="heateorSssSharingRound">
                  <i style="width:18px;height:18px;border-radius:999px;" alt="Facebook" title="Facebook" class="heateorSssSharing heateorSssFacebookBackground" onclick="heateorSssPopup('https://www.facebook.com/sharer/sharer.php?u={{$shareLink}}')">
                    <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssFacebookSvg"></ss>
                  </i>
                </li>
                <li class="heateorSssSharingRound">
                  <i style="width:18px;height:18px;border-radius:999px;" alt="Twitter" title="Twitter" class="heateorSssSharing heateorSssTwitterBackground" onclick="heateorSssPopup('https://twitter.com/intent/tweet?text={{$shareText}}&url={{$shareLink}}')">
                    <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssTwitterSvg"></ss>
                  </i>
                </li>
                <li class="heateorSssSharingRound">
                  <i style="width:18px;height:18px;border-radius:999px;" alt="" title="" class="heateorSssSharing">
                    <a href="http://web.whatsapp.com/send?text={{$shareText}} {{$shareLink}}" target="_blank">
                      <ss style="display:block" class="heateorSssSharingSvg heateorSssWhatsappSvg"></ss>
                    </a>
                  </i>
                </li>
                <li class="heateorSssSharingRound">
                  <i style="width:18px;height:18px;border-radius:999px;" alt="Google Bookmarks" title="Google Bookmarks" class="heateorSssSharing heateorSssGoogleBookmarksBackground" onclick="heateorSssPopup('https://www.google.com/bookmarks/mark?op=edit&bkmk={{$shareLink}}')">
                    <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssGoogleBookmarksSvg"></ss>
                  </i>
                </li>
                <li class="heateorSssSharingRound"><i style="width:18px;height:18px;border-radius:999px;" alt="Telegram" title="Telegram" class="heateorSssSharing heateorSssTelegramBackground" onclick="heateorSssPopup('https://telegram.me/share/url?url={{$shareLink}}')">
                    <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssTelegramSvg"></ss>
                  </i>
                </li>
              </ul>
              <div class="heateorSssClear"></div>
            </div>
          <?php wp_reset_postdata(); ?>
        @endforeach
      @else
        {!! $quote !!}
        {!! do_shortcode("[Sassy_Social_Share url='".get_home_url()."']")  !!}
      @endif

    </div>
  </div>
</section>
