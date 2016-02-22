<?php

/* --------------------------------------------------
Kirby Notifier - notify admin at user logins

# kirbyNotifierEmail > admin email-address
# kirbyNotifierPanel > base dir of the panel
# kirbyNotifierRemote > allow remote API calls *)
# *) for the location, no private data is send
-------------------------------------------------- */

c::set('kirbyNotifierEmail','email_at_domain_dot_com');
c::set('kirbyNotifierPanel','panel');
c::set('kirbyNotifierRemote',true);

?>