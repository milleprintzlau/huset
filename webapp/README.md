# Basic files for a Progressive Web App

- manifest.json
- pwabuilder-sw-register.js - to register service worker
- pwabuilder-sw.js - basic service worker to show a specific file when the device i offline

Basic iOS metatags to go in the html head section:

```<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="start_url" content="/huset/mobil">
<meta name="apple-mobile-web-app-title" content="HUSET KBH">
<link rel="apple-touch-icon" sizes="192x192" href="img/icon.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icon@0.75x.png">
