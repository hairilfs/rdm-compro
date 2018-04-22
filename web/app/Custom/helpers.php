<?php 

function getAbout($section='who', $key='')
{
	$about = \App\About::where([
		['section', $section],
		['setting_key', $key],
	])->first();

	if (count($about)) {
		return $about->getContent();
	}
}

function getRdm($section='rdm-1', $key='')
{
	$rdm = \App\Rdm::where([
		['section', $section],
		['setting_key', $key],
	])->first();

	if (count($rdm)) {
		return $rdm->getContent();
	}
}

function getSetting($section='Home', $key='')
{
	$setting = \App\Setting::where([
		['section', $section],
		['setting_key', $key],
	])->first();

	if (count($setting)) {
		return $setting->getContent();
	}
}

function getYoutubeId($url='')
{
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches[1];
}