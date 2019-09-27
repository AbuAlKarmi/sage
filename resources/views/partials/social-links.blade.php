<ul class="social-links list-inline unstyled-list mb-0 mt-2">
  @if(isset($hasSearch) && $hasSearch)
  <li class="list-inline-item"><a href="{{home_url("/?s=")}}">@include('icons::search', ['width' => '20', 'height' => '20'])</a></li>
  @endif
  <li class="list-inline-item"><a href="https://www.facebook.com/MetrasWebsite">@include('icons::social.facebook', ['width' => '20', 'height' => '20'])</a></li>
  <li class="list-inline-item"><a href="https://twitter.com/MetrasWebsite">@include('icons::social.twitter', ['width' => '20', 'height' => '20px'])</a></li>
  <li class="list-inline-item"><a href="https://soundcloud.com/metraswebsite">@include('icons::social.soundcloude', ['width' => '20', 'height' => '20'])</a></li>
  <li class="list-inline-item"><a href="https://www.instagram.com/metraswebsite">@include('icons::social.instagram', ['width' => '20', 'height' => '20'])</a></li>
  <li class="list-inline-item"><a href="https://www.baaz.com/metraswebsite">@include('icons::social.baaz', ['width' => '20', 'height' => '20'])</a></li>
  <li class="list-inline-item"><a href="https://www.youtube.com/channel/UC2hr1ji2DA_uRn_uuHKncYQ">@include('icons::social.youtube', ['width' => '20', 'height' => '20'])</a></li>
</ul>
