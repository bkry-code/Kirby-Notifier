# Kirby - Notifier

**Version 0.0.1 / November, 23rd 2015 - intial public offering.**

Send an email to the admin, everytime a user has logged in to the panel.

**IMPORTANT**

The remote API is not always working which can disble access to the Kirby panel; please, be aware of this issue.

You can disable the remote access in the settings (see below), this will not alter the plugin itself.

****

### What is it?

Kirby Notifier is a simple plugin that notifies the sites administrator by mail, everytime an user has logged in to the panel.

The plugin works standalone and is inspired by the Wordpress' Wordfence plugin ( https://www.wordfence.com/ )

### Why is it?

It helps admins to keep an eye on their site-usage and it can warn them when someone logs under with aberrant circumstances.

### How to install?

1. Copy / paste the directory ```/site/plugins/notifier``` (and all of it's files) to your own Kirby-site.
2. Set some preferences in ```site/config/config.php``` (see ```_config.php``` for the basic settings).

  1. **kirbyNotifierEmail** - the email-address of the sites administrator
  2. **kirbyNotifierPanel** - the root-folder of Kirbies panel (defaults to ```panel```)
  3. **kirbyNotifierRemote** - whether or not the plugin is allowed to call a remote server *)

*) The remote server is called for detailed location information about the logged in user. No private data is send, only the users IP-address, which will return a longitude / langitude and country / city.

This Location-data is provided for free by http://www.hostip.info/ and http://www.geoplugin.com/ (no need to register, but can be helpfull).

### How does the email look like?

****

**Subject** - [Kirby Notifier] WebsiteName login

**From** - do-not-reply@websitename.com

**Date** - Mon, 23 Nov 2015 20:39:37 +0100

**To** - admin@websitename.com

****

This email was sent from the site "WebsiteName" by the Kirby Notifier plugin.

An user with username "John Doh!" who has administrator privileges just signed in.

If you think this login is erroneous, you can contact the user "FirstName LastName" at user@websitename.com

---
Login details;
---

Date : Monday, 23rd of November 2015 - 20:39:37

IP-address : 104.85.21.227

Referer : http://websitename.com/panel/login

Location : The United States of America / Washington (approx.)

Map : https://www.google.nl/maps/place//@38.898060,-77.037131,14z/

Language : EN / English

Provider : president.whitehouse.gov

Country : The United States of America

Server : ny009.whitehouse.gov

Domain : websitename.com

System : Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36

---
