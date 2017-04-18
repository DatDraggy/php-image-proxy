# php-image-proxy
Just a small cancerous image proxy for PHP. Not perfect but does what it's supposed to do.
Probably not a good way but just needed a fast way to create such a thing.

Usage: http://example.com/image-proxy.php?url=https://puu.sh/vo05v/640b8e7401.png

If you want to make this publicly usable, you should use another way than the substr($image, -3); lol. 
If you still need to proxy a URL without the file extension, then you have to use an if.
