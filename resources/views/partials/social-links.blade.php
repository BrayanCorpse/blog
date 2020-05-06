<div class="buttons-social-media-share">
            <ul class="share-buttons">
              <li>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}&title={{ $description }}" title="Compartir en Facebook" target="_blank">

                <img alt="Compartir en Facebook" src="{{asset('img/flat_web_icon_set/Facebook.png')}}">
              </a>

            </li>

              <li>
                
              <a href="https://twitter.com/intent/tweet?url={{ url()->full() }}&text={{ $description }}&via={{ config('app.name') }}&hashtags=zendero" target="_blank" title="Tweet">
              
              <img alt="Tweet" src="{{asset('img/flat_web_icon_set/Twitter.png')}}">
            
            </a>
          
          </li>

              <li>
                
              <a href="https://reddit.com/submit?url={{ url()->full() }}&title={{ $description }}" target="_blank" title="Compartir en Reddit">
              
              <img alt="Compartir en Reddit" src="{{asset('img/flat_web_icon_set/Reddit.png')}}">
            
            </a>
          
          </li>

              <li>
                
              <a href="http://pinterest.com/pin/create/button/?url={{ url()->full() }}&description={{ $description }}" target="_blank" title="Pin it">
              
              <img alt="Pin it" src="{{asset('img/flat_web_icon_set/Pinterest.png')}}">
            
            </a>
          
          </li>

            </ul>
          </div>