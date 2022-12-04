{"version":3,"sources":["inline-video.js"],"names":["BX","addCustomEvent","window","event","initBlock","slice","call","block","querySelectorAll","node","hasAttribute","videos","length","forEach","video","resetPlayerPreview","source","dataset","src","Landing","Utils","Matchers","youtube","test","indexOf","getMode","loadPlayerYT","autoplay","mute","tagName","bind","onYTPreviewClick","vk","preview","loadPlayerVK","vimeo","vine","facebookVideos","rutube","loadPlayerIframe","showError","classList","remove","add","innerHTML","message","playerPreview","clearPlayerPreview","create","props","className","style","backgroundImage","insertBefore","unbind","target","additionalParams","loader","Loader","show","playerFrame","createPlayerFrame","playerParams","Object","keys","onPlayerReadyHandler","hide","MediaPlayer","Factory","addQueryParams","addEventListener","selector","attrs","util","htmlspecialcharsback","frameborder","allowfullscreen","allow"],"mappings":"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","file":"inline-video.map.js"}