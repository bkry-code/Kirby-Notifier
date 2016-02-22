<?php

// error_reporting(E_ALL ^ E_NOTICE);
// ini_set('display_errors',1);

$debug = 0;

/* ---------------------------------------------------------- */

$date      = date('l, jS \of F Y - H:i:s');
$server    = gethostname();
$domain    = $_SERVER['HTTP_HOST']; /* $_SERVER['SERVER_NAME']; */
$ip        = $_SERVER['REMOTE_ADDR'];
$ref       = $_SERVER['HTTP_REFERER'];
  if(empty($ref))$ref = '(unknown)';
$system    = $_SERVER['HTTP_USER_AGENT'];
$lang_code = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
  if(strpos($lang_code,',')>1)$lang_code = substr($lang_code,0,strpos($lang_code,','));
$provider  = gethostbyaddr(getenv('REMOTE_ADDR'));
  if(empty($provider))$provider = '(unknown)';

/* ---------------------------------------------------------- */

$languages = array('Afrikaans|af','Albanian|sq','Arabic (Algeria)|ar-dz','Arabic (Bahrain)|ar-bh','Arabic (Egypt)|ar-eg','Arabic (Iraq)|ar-iq','Arabic (Jordan)|ar-jo','Arabic (Kuwait)|ar-kw','Arabic (Lebanon)|ar-lb','Arabic (libya)|ar-ly','Arabic (Morocco)|ar-ma','Arabic (Oman)|ar-om','Arabic (Qatar)|ar-qa','Arabic (Saudi Arabia)|ar-sa','Arabic (Syria)|ar-sy','Arabic (Tunisia)|ar-tn','Arabic (U.A.E.)|ar-ae','Arabic (Yemen)|ar-ye','Arabic|ar','Armenian|hy','Assamese|as','Azeri (Cyrillic)|az','Azeri (Latin)|az','Basque|eu','Belarusian|be','Bengali|bn','Bulgarian|bg','Catalan|ca','Chinese (China)|zh-cn','Chinese (Hong Kong SAR)|zh-hk','Chinese (Macau SAR)|zh-mo','Chinese (Singapore)|zh-sg','Chinese (Taiwan)|zh-tw','Chinese|zh','Croatian|hr','Chech|cs','Danish|da','Divehi|div','Dutch (Belgium)|nl-be','Dutch (Netherlands)|nl','Dutch (Netherlands)|nl-nl','English (Australia)|en-au','English (Belize)|en-bz','English (Canada)|en-ca','English (Caribbean)|en','English (Ireland)|en-ie','English (Jamaica)|en-jm','English (New Zealand)|en-nz','English (Philippines)|en-ph','English (South Africa)|en-za','English (Trinidad)|en-tt','English (United Kingdom)|en-gb','English (United States)|en-us','English (Zimbabwe)|en-zw','English|en','Estonian|et','Faeroese|fo','Farsi|fa','Finnish|fi','French (Belgium)|fr-be','French (Canada)|fr-ca','French (France)|fr','French (Luxembourg)|fr-lu','French (Monaco)|fr-mc','French (Switzerland)|fr-ch','FYRO Macedonian|mk','Gaelic|gd','Georgian|ka','German (Austria)|de-at','German (Germany)|de','German (Liechtenstein)|de-li','German (lexumbourg)|de-lu','German (Switzerland)|de-ch','Greek|el','Gujarati|gu','Hebrew|he','Hindi|hi','Hungarian|hu','Icelandic|is','Indonesian|id','Italian (Italy)|it','Italian (Switzerland)|it-ch','Japanese|ja','Kannada|kn','Kazakh|kk','Konkani|kok','Korean|ko','Kyrgyz|kz','Latvian|lv','Lithuanian|lt','Malay (Brunei)|ms','Malay (Malaysia)|ms','Malayalam|ml','Maltese|mt','Marathi|mr','Mongolian (Cyrillic)|mn','Nepali (India)|ne','Norwegian (Bokmal)|nb-no','Norwegian (Bokmal)|no','Norwegian (Nynorsk)|nn-no','Oriya|or','Polish|pl','Portuguese (Brazil)|pt-br','Portuguese (Portugal)|pt','Punjabi|pa','Rhaeto-Romanic|rm','Romanian (Moldova)|ro-md','Romanian|ro','Russian (Moldova)|ru-md','Russian|ru','Sanskrit|sa','Serbian (Cyrillic)|sr','Serbian (Latin)|sr','Slovak|sk','Slovenian|ls','Sorbian|sb','Spanish (Argentina)|es-ar','Spanish (Bolivia)|es-bo','Spanish (Chile)|es-cl','Spanish (Colombia)|es-co','Spanish (Costa Rica)|es-cr','Spanish (Dominican Republic)|es-do','Spanish (Ecuador)|es-ec','Spanish (El Salvador)|es-sv','Spanish (Guatemala)|es-gt','Spanish (Honduras)|es-hn','Spanish (International Sort)|es','Spanish (Mexico)|es-mx','Spanish (Nicaragua)|es-ni','Spanish (Panama)|es-pa','Spanish (Paraguay)|es-py','Spanish (Peru)|es-pe','Spanish (Puerto Rico)|es-pr','Spanish (Traditional Sort)|es','Spanish (United States)|es-us','Spanish (Uruguay)|es-uy','Spanish (Venezuela)|es-ve','Sutu|sx','Swahili|sw','Swedish (Finland)|sv-fi','Swedish|sv','Syriac|syr','Tamil|ta','Tatar|tt','Telugu|te','Thai|th','Tsonga|ts','Tswana|tn','Turkish|tr','Ukrainian|uk','Urdu|ur','Uzbek (Cyrillic)|uz','Uzbek (Latin)|uz','Vietnamese|vi','Xhosa|xh','Yiddish|yi','Zulu|zu');

  for($i=0;$i<count($languages);$i++)
  	{
  $language_tmp = substr($languages[$i],strpos($languages[$i],'|')+1);
  if(strtolower($lang_code)== $language_tmp)$language = substr($languages[$i],0,strpos($languages[$i],'|'));
  	}

  if(empty($language)){$language = '(unknown)';}

/* ---------------------------------------------------------- */

$countries = array('localhost|Internal Network','aero|Air-Transport','arpa|Infrastructure','asia|Asia-Pacific Region','biz|Business','cat|Catalan','com|Commercial','coop|Cooperatives','edu|Educational','gov|US Governmental','info|Information','int|International Organizations','jobs|Companies','mil|US Military','mobi|Mobile Devices','museum|Museums','name|Individuals (by name)','nato|North Atlantic Treaty Organization','net|Network','org|Organization','pro|Professions','tel|Internet communication services ','travel|Travel and tourism industry related sites','ac|Ascension Island','ad|Andorra','ae|United Arab Emirates','af|Afghanistan','ag|Antigua and Barbuda','ai|Anguilla','al|Albania','am|Armenia','an|Netherlands Antilles','ao|Angola','aq|Antarctica','ar|Argentina','as|American Samoa','at|Austria','au|Australia','aw|Aruba','ax|Åland Islands','az|Azerbaijan','ba|Bosnia and Herzegovina','bb|Barbados','bd|Bangladesh','be|Belgium','bf|Burkina Faso','bg|Bulgaria','bh|Bahrain','bi|Burundi','bj|Benin','bl|Saint Barthélemy','bm|Bermuda','bn|Brunei','bo|Bolivia','br|Brazil','bs|Bahamas','bt|Bhutan','bv|Bouvet Island','bw|Botswana','by|Belarus','bz|Belize','ca|Canada','cc|Cocos (Keeling) Islands','cd|Democratic Republic of the Congo (formerly zr|Zaire)','cf|Central African Republic','cg|Republic of the Congo','ch|Switzerland','ci|Côte d\'Ivoire (Ivory Coast)','ck|Cook Islands','cl|Chile','cm|Cameroon','cn|People\'s Republic of China','co|Colombia','cr|Costa Rica','cu|Cuba','cv|Cape Verde','cx|Christmas Island','cy|Cyprus','cz|Czech Republic','de|Germany','dj|Djibouti','dk|Denmark','dm|Dominica','do|Dominican Republic','dz|Algeria','ec|Ecuador','ee|Estonia','eg|Egypt','eh|Western Sahara','er|Eritrea','es|Spain','et|Ethiopia','eu|European Union','fi|Finland','fj|Fiji','fk|Falkland Islands','fm|Federated States of Micronesia','fo|Faroe Islands','fr|France','ga|Gabon','gb|United Kingdom (deprecated|see uk)','gd|Grenada','ge|Georgia','gf|French Guiana','gg|Guernsey','gh|Ghana','gi|Gibraltar','gl|Greenland','gm|Gambia','gn|Guinea','gp|Guadeloupe','gq|Equatorial Guinea','gr|Greece','gs|South Georgia and the South Sandwich Islands','gt|Guatemala','gu|Guam','gw|Guinea-Bissau','gy|Guyana','hk|Hong Kong','hm|Heard Island and McDonald Islands','hn|Honduras','hr|Croatia','ht|Haiti','hu|Hungary','id|Indonesia','ie|Ireland','il|Israel','im|Isle of Man','in|India','io|British Indian Ocean Territory','iq|Iraq','ir|Iran','is|Iceland','it|Italy','je|Jersey','jm|Jamaica','jo|Jordan','jp|Japan','ke|Kenya','kg|Kyrgyzstan','kh|Cambodia','ki|Kiribati','km|Comoros','kn|Saint Kitts and Nevis','kp|North Korea','kr|South Korea','kw|Kuwait','ky|Cayman Islands','kz|Kazakhstan','la|Laos','lb|Lebanon','lc|Saint Lucia','li|Liechtenstein','lk|Sri Lanka','lr|Liberia','ls|Lesotho','lt|Lithuania','lu|Luxembourg','lv|Latvia','ly|Libya','ma|Morocco','mc|Monaco','md|Moldova','me|Montenegro','mf|Saint Martin','mg|Madagascar','mh|Marshall Islands','mk|Republic of Macedonia','ml|Mali','mm|Myanmar','mn|Mongolia','mo|Macau','mp|Northern Mariana Islands','mq|Martinique','mr|Mauritania','ms|Montserrat','mt|Malta','mu|Mauritius','mv|Maldives','mw|Malawi','mx|Mexico','my|Malaysia','mz|Mozambique','na|Namibia','nc|New Caledonia','ne|Niger','nf|Norfolk Island','ng|Nigeria','ni|Nicaragua','nl|The Netherlands','no|Norway','np|Nepal','nr|Nauru','nu|Niue','nz|New Zealand','om|Oman','pa|Panama','pe|Peru','pf|French Polynesia','pg|Papua New Guinea','ph|Philippines','pk|Pakistan','pl|Poland','pm|Saint Pierre and Miquelon','pn|Pitcairn Islands','pr|Puerto Rico','ps|Palestine','pt|Portugal','pw|Palau','py|Paraguay','qa|Qatar','re|Réunion','ro|Romania','rs|Serbia','ru|Russia','rw|Rwanda','sa|Saudi Arabia','sb|Solomon Islands','sc|Seychelles','sd|Sudan','se|Sweden','sg|Singapore','sh|Saint Helena','si|Slovenia','sj|Svalbard and Jan Mayen islands','sk|Slovakia','sl|Sierra Leone','sm|San Marino','sn|Senegal','so|Somalia','sr|Suriname','st|São Tomé and Príncipe','su|Soviet Union (deprecated)','sv|El Salvador','sy|Syria','sz|Swaziland','tc|Turks and Caicos Islands','td|Chad','tf|French Southern and Antarctic Lands','tg|Togo','th|Thailand','tj|Tajikistan','tk|Tokelau','tl|East Timor','tm|Turkmenistan','tn|Tunisia','to|Tonga','tp|East Timor (not used, see lt)','tr|Turkey','tt|Trinidad and Tobago','tv|Tuvalu','tw|Taiwan','tz|Tanzania','ua|Ukraine','ug|Uganda','uk|United Kingdom','um|US Minor Outlying Islands (code terminated)','us|United States','uy|Uruguay','uz|Uzbekistan','va|Vatican City','vc|Saint Vincent and the Grenadines','ve|Venezuela','vg|British Virgin Islands','vi|United States Virgin Islands','vn|Vietnam','vu|Vanuatu','wf|Wallis and Futuna','ws|Samoa (formerly Western Samoa)','ye|Yemen','yt|Mayotte','yu|Yugoslavia','za|South Africa','zm|Zambia','zw|Zimbabwe');

  $country_code = strtolower($provider);
  if(substr_count($country_code,'.')){$country_code = substr($country_code,strrpos($country_code,'.')+1);}

  for($i=0;$i<count($countries);$i++)
  	{
  $country_tmp	= substr($countries[$i],0,strpos($countries[$i],'|'));
  if($country_code==$country_tmp)$country = substr($countries[$i],strpos($countries[$i],'|')+1);
  	}

  if(empty($country)){$country = '(unknown)';}

/* ---------------------------------------------------------- */

$localHost = array('127.0.0.1','::1');

  if(in_array($_SERVER['REMOTE_ADDR'],$localHost))
    {
  $kirbyNotifierRemote = false;
    }

if($kirbyNotifierRemote)
  {
$geoplugin  = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));

  if (is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']))
    {
  $lat  = $geoplugin['geoplugin_latitude'];
  $long = $geoplugin['geoplugin_longitude'];
    }

/* ---------------------------------------------------------- */

$content   = file_get_contents('http://api.hostip.info/get_json.php?ip='.$ip);
$data      = json_decode($content);
$location1 = ucfirst(strtolower($data->{'country_name'}));
$location2 = ucfirst(strtolower($data->{'city'}));
  }

/* ---------------------------------------------------------- */

$subject = '[Kirby Notifier] '.$site->title().' login';
$intro   = 'This email was sent from the site "'.$site->title().'" by the Kirby Notifier plugin.'.chr(10).chr(10);
$intro  .= 'An user with username "'.$site->user().'" who has '.$adminUser.'administrator privileges just signed in.'.chr(10).chr(10);
$intro  .= 'If you think this login is erroneous, you can contact the user '.$quoteUser.$site->user()->firstName().$spaceUser.$site->user()->lastName().$quoteUser.$spaceUser.'at '.$site->user()->email().chr(10).chr(10);

$intro  .= '--------------'.chr(10);
$intro  .= 'Login details;'.chr(10);
$intro  .= '--------------'.chr(10).chr(10);
$extro   = '--------------';

$msg  = $intro;
$msg .= 'Date : '.$date.chr(10).chr(10);
$msg .= 'IP-address : '.$ip.chr(10).chr(10);
$msg .= 'Referer : '.$ref.chr(10).chr(10);

  if($kirbyNotifierRemote)
    {
  $msg .= 'Location : '.$location1.' / '.$location2.' (approx.)'.chr(10).chr(10);
  $msg .= 'Map : https://www.google.nl/maps/place//@'.$lat.','.$long.',14z/'.chr(10).chr(10);
    }
  else
    {
  $msg .= 'Location : (disabled in settings)'.chr(10).chr(10);
  $msg .= 'Map : (disabled in settings)'.chr(10).chr(10);
    }

$msg .= 'Language : '.strtoupper($lang_code).' / '.$language.chr(10).chr(10);
$msg .= 'Provider : '.$provider.chr(10).chr(10);
$msg .= 'Country : '.$country.chr(10).chr(10);
$msg .= 'Server : '.$server.chr(10).chr(10);
$msg .= 'Domain : '.$domain.chr(10).chr(10);
$msg .= 'System : '.$system.chr(10).chr(10);
$msg .= $extro;

$email_to      = $kirbyNotifierEmail;
$email_subject = $subject;
$email_message = $msg;
$email_from    = 'do-not-reply@'.$domain;

$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n".'X-Mailer: PHP/' . phpversion();

  if(!$debug)
    {
  @mail($email_to,$email_subject,$email_message,$headers);
    }
  else
    {
  die('<pre><b>'.$msg.'</b></pre>');
    }

?>