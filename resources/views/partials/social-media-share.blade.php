<div class="heateor_sss_sharing_container heateor_sss_horizontal_sharing" ss-offset="0" data-title="{{$shareText}}" heateor-sss-data-href="{!!$shareLink!!}">
  <ul class="heateor_sss_sharing_ul">
    <li class="heateorSssSharingRound">
      <i style="width:18px;height:18px;border-radius:999px;" alt="Facebook" title="Facebook" class="heateorSssSharing heateorSssFacebookBackground" onclick="heateorSssPopup('https://www.facebook.com/sharer/sharer.php?u={!!$shareLink!!}')">
        <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssFacebookSvg"></ss>
      </i>
    </li>
    <li class="heateorSssSharingRound">
      <i style="width:18px;height:18px;border-radius:999px;" alt="Twitter" title="Twitter" class="heateorSssSharing heateorSssTwitterBackground" onclick="heateorSssPopup('https://twitter.com/intent/tweet?text={{$shareText}}&url={!!$shareLink!!}')">
        <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssTwitterSvg"></ss>
      </i>
    </li>
    <li class="heateorSssSharingRound">
      <i style="width:18px;height:18px;border-radius:999px;" alt="" title="" class="heateorSssSharing">
        <a href="http://web.whatsapp.com/send?text={{$shareText}} {!!$shareLink!!}" target="_blank">
          <ss style="display:block" class="heateorSssSharingSvg heateorSssWhatsappSvg"></ss>
        </a>
      </i>
    </li>
    <li class="heateorSssSharingRound">
      <i style="width:18px;height:18px;border-radius:999px;" alt="Google Bookmarks" title="Google Bookmarks" class="heateorSssSharing heateorSssGoogleBookmarksBackground" onclick="heateorSssPopup('https://www.google.com/bookmarks/mark?op=edit&bkmk={!!$shareLink!!}')">
        <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssGoogleBookmarksSvg"></ss>
      </i>
    </li>
    <li class="heateorSssSharingRound"><i style="width:18px;height:18px;border-radius:999px;" alt="Telegram" title="Telegram" class="heateorSssSharing heateorSssTelegramBackground" onclick="heateorSssPopup('https://telegram.me/share/url?url={!!$shareLink!!}')">
        <ss style="display:block;border-radius:999px;" class="heateorSssSharingSvg heateorSssTelegramSvg"></ss>
      </i>
    </li>
  </ul>
  <div class="heateorSssClear"></div>
</div>
