# php-image-proxy
Example usage: You want to display an image that is being generated dynamically on another website/service and want your site to run on only-SSL connections, but the source doesn't support that.

Basically just gets the mimetype from the specified URL, checks if that mime is allowed and if thats the case, it sets the correct header and displays the result (image, video, whatever you allow).

Usage: http://example.com/image-proxy.php?url=https://puu.sh/vo05v/640b8e7401.png

If you want to track from where people wanted to use unsupported mimetypes, delete the comments on line 27 & 53 (52).
