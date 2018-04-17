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

function getYoutubeId($url='')
{
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches[1];
}