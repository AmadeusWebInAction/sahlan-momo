<?php
$staticUrls = [
	//locals
	'local-url' => 'http://localhost/networks/sahlan-momo/live/static/',
	'local-preview-url' => 'http://localhost/networks/sahlan-momo/static/',
	//lives
	'live-url' => 'https://sahlan-momo.amadeusweb.site/static/',
	'live-preview-url' => 'https://preview-sahlan-momo.amadeusweb.site/static/',
];

variables([
	'network-static-folder' => NETWORKPATH . '/',
	'network-static' => $static = $staticUrls[variable(SITEURLKEY)],
	'site-static-folder' => NETWORKPATH . '/' . SITENAME . '/',
	'site-static' => $static . SITENAME . '/',
]);

addStyle('network', 'network-static--common-assets');
addStyle(SITENAME, 'network-static--common-assets');

if (SITENAME == 'cave3') {
	variable('footer-widgets-in-enrich', true);
}

function enrichThemeVars($vars, $what) {
	if (SITENAME == 'cave3' && variable('footer-widgets-in-enrich')) {
		$vars['footer-widgets'] = getSnippet('footer-links');
	}

	return $vars;
}

variables([
	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/imran-ali-namazi/', 'name' => 'Founder Imran' ],
	],
	'searches' => [
		'amadeusweb' => ['code' => 'c0a96edc60a44407a"', 'name' => 'AmadeusWeb Network', 'description' => 'All AmadeusWeb sites (world, web, imran and core)'],
	],
]);
