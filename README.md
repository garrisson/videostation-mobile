##VIDEOSTATION MOBILE##

This is a add-on for videostation, a package for synologoy diskstations.
It will give you a mobile interface for your videostation. It's written with jquery-mobile.

#INSTALLATION#

Download the zip and upload its content to the videostation base directory(typically volume1/web/video).
No further setup needed, it will gain all information from the config.php etc. of videostation.

#CHANGELOG#
-27.06.2012:
*cleaned up complete script
*new site structure
*added lazy load for complete movie list. Alternativly script with load more button(folder #load_more_button). Both feature developed due to performance issues with complete movielist on iOS devices.
*added admin page(check if logged in as admin)
*added login support
*some minor design changes(=>movies.php:movielist:left part link to mor infos, right part(with arrow) link to movie file)