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
	'assets-override' => 'https://cave3.org/wp-content', //until ftp access to smf / we decide if its 4 different statics or what

	//
	'sections-have-files' => true,
	'no-page-menu' => true, //doesnt as yet support sections with files
]);

if ($pv = variable('preview')) {
	variables($d = [
		'default-search' => $mn = 'sahlanallpreviews',
		'searches' => [
			$mn => ['code' => '803ec2335211b42d3', 'name' => 'All 4 sites of Sahlan Momo', 'description' => '[description to follow]'],
		],
	]);
}
if (!$pv) {
	$temp = main::defaultSearches();
	variables($d = [
		'default-search' => $ds = 'imranali',
		'searches' => [
			$ds => $temp[$ds],
		],
	]);
}
parameterError('SEARCH', $temp);

addStyle('network', 'network-static--common-assets');
addStyle(SITENAME, 'network-static--common-assets');

if (SITENAME == 'cave3') {
	variable('footer-widgets-in-enrich', true);
}

function enrichThemeVars($vars, $what) {
	if (variable('footer-widgets-in-enrich')) {
		$html = getSnippet('footer-links');
		$html = replaceItems($html, [
			
		]);
		$vars['footer-widgets'] = $html;
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
