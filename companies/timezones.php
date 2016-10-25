<?
// EXAMPLE: gmt("m/d/Y h:i:s", $company->timezone)
function timezones(){
	$timezone = new stdClass();

	$timezone->timeZoneId="1";
	$timezone->gmtAdjustment="GMT-12:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-12";
	$timezone->description="(GMT-12:00) International Date Line West";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="2";
	$timezone->gmtAdjustment="GMT-11:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-11";
	$timezone->description="(GMT-11:00) Midway Island, Samoa";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="3";
	$timezone->gmtAdjustment="GMT-10:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-10";
	$timezone->description="(GMT-10:00) Hawaii";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="4";
	$timezone->gmtAdjustment="GMT-09:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-9";
	$timezone->description="(GMT-09:00) Alaska";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="5";
	$timezone->gmtAdjustment="GMT-08:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-8";
	$timezone->description="(GMT-08:00) Pacific Time (US & Canada)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="6";
	$timezone->gmtAdjustment="GMT-08:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-8";
	$timezone->description="(GMT-08:00) Tijuana, Baja California";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="7";
	$timezone->gmtAdjustment="GMT-07:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-7";
	$timezone->description="(GMT-07:00) Arizona";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="8";
	$timezone->gmtAdjustment="GMT-07:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-7";
	$timezone->description="(GMT-07:00) Chihuahua, La Paz, Mazatlan";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="9";
	$timezone->gmtAdjustment="GMT-07:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-7";
	$timezone->description="(GMT-07:00) Mountain Time (US & Canada)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="10";
	$timezone->gmtAdjustment="GMT-06:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-6";
	$timezone->description="(GMT-06:00) Central America";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="11";
	$timezone->gmtAdjustment="GMT-06:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-6";
	$timezone->description="(GMT-06:00) Central Time (US & Canada)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="12";
	$timezone->gmtAdjustment="GMT-06:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-6";
	$timezone->description="(GMT-06:00) Guadalajara, Mexico City, Monterrey";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="13";
	$timezone->gmtAdjustment="GMT-06:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-6";
	$timezone->description="(GMT-06:00) Saskatchewan";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="14";
	$timezone->gmtAdjustment="GMT-05:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-5";
	$timezone->description="(GMT-05:00) Bogota, Lima, Quito, Rio Branco";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="15";
	$timezone->gmtAdjustment="GMT-05:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-5";
	$timezone->description="(GMT-05:00) Eastern Time (US & Canada)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="16";
	$timezone->gmtAdjustment="GMT-05:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-5";
	$timezone->description="(GMT-05:00) Indiana (East)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="17";
	$timezone->gmtAdjustment="GMT-04:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-4";
	$timezone->description="(GMT-04:00) Atlantic Time (Canada)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="18";
	$timezone->gmtAdjustment="GMT-04:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-4";
	$timezone->description="(GMT-04:00) Caracas, La Paz";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="19";
	$timezone->gmtAdjustment="GMT-04:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-4";
	$timezone->description="(GMT-04:00) Manaus";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="20";
	$timezone->gmtAdjustment="GMT-04:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-4";
	$timezone->description="(GMT-04:00) Santiago";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="21";
	$timezone->gmtAdjustment="GMT-03:30";
	$timezone->useDaylightTime="1";
	$timezone->value="-3.5";
	$timezone->description="(GMT-03:30) Newfoundland";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="22";
	$timezone->gmtAdjustment="GMT-03:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-3";
	$timezone->description="(GMT-03:00) Brasilia";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="23";
	$timezone->gmtAdjustment="GMT-03:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-3";
	$timezone->description="(GMT-03:00) Buenos Aires, Georgetown";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="24";
	$timezone->gmtAdjustment="GMT-03:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-3";
	$timezone->description="(GMT-03:00) Greenland";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="25";
	$timezone->gmtAdjustment="GMT-03:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-3";
	$timezone->description="(GMT-03:00) Montevideo";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="26";
	$timezone->gmtAdjustment="GMT-02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-2";
	$timezone->description="(GMT-02:00) Mid-Atlantic";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="27";
	$timezone->gmtAdjustment="GMT-01:00";
	$timezone->useDaylightTime="0";
	$timezone->value="-1";
	$timezone->description="(GMT-01:00) Cape Verde Is.";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="28";
	$timezone->gmtAdjustment="GMT-01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="-1";
	$timezone->description="(GMT-01:00) Azores";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="29";
	$timezone->gmtAdjustment="GMT+00:00";
	$timezone->useDaylightTime="0";
	$timezone->value="0";
	$timezone->description="(GMT+00:00) Casablanca, Monrovia, Reykjavik";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="30";
	$timezone->gmtAdjustment="GMT+00:00";
	$timezone->useDaylightTime="1";
	$timezone->value="0";
	$timezone->description="(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="31";
	$timezone->gmtAdjustment="GMT+01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="1";
	$timezone->description="(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="32";
	$timezone->gmtAdjustment="GMT+01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="1";
	$timezone->description="(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="33";
	$timezone->gmtAdjustment="GMT+01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="1";
	$timezone->description="(GMT+01:00) Brussels, Copenhagen, Madrid, Paris";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="34";
	$timezone->gmtAdjustment="GMT+01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="1";
	$timezone->description="(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="35";
	$timezone->gmtAdjustment="GMT+01:00";
	$timezone->useDaylightTime="1";
	$timezone->value="1";
	$timezone->description="(GMT+01:00) West Central Africa";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="36";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Amman";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="37";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Athens, Bucharest, Istanbul";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="38";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Beirut";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="39";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Cairo";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="40";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="0";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Harare, Pretoria";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="41";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="42";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Jerusalem";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="43";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Minsk";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="44";
	$timezone->gmtAdjustment="GMT+02:00";
	$timezone->useDaylightTime="1";
	$timezone->value="2";
	$timezone->description="(GMT+02:00) Windhoek";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="45";
	$timezone->gmtAdjustment="GMT+03:00";
	$timezone->useDaylightTime="0";
	$timezone->value="3";
	$timezone->description="(GMT+03:00) Kuwait, Riyadh, Baghdad";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="46";
	$timezone->gmtAdjustment="GMT+03:00";
	$timezone->useDaylightTime="1";
	$timezone->value="3";
	$timezone->description="(GMT+03:00) Moscow, St. Petersburg, Volgograd";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="47";
	$timezone->gmtAdjustment="GMT+03:00";
	$timezone->useDaylightTime="0";
	$timezone->value="3";
	$timezone->description="(GMT+03:00) Nairobi";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="48";
	$timezone->gmtAdjustment="GMT+03:00";
	$timezone->useDaylightTime="0";
	$timezone->value="3";
	$timezone->description="(GMT+03:00) Tbilisi";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="49";
	$timezone->gmtAdjustment="GMT+03:30";
	$timezone->useDaylightTime="1";
	$timezone->value="3.5";
	$timezone->description="(GMT+03:30) Tehran";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="50";
	$timezone->gmtAdjustment="GMT+04:00";
	$timezone->useDaylightTime="0";
	$timezone->value="4";
	$timezone->description="(GMT+04:00) Abu Dhabi, Muscat";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="51";
	$timezone->gmtAdjustment="GMT+04:00";
	$timezone->useDaylightTime="1";
	$timezone->value="4";
	$timezone->description="(GMT+04:00) Baku";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="52";
	$timezone->gmtAdjustment="GMT+04:00";
	$timezone->useDaylightTime="1";
	$timezone->value="4";
	$timezone->description="(GMT+04:00) Yerevan";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="53";
	$timezone->gmtAdjustment="GMT+04:30";
	$timezone->useDaylightTime="0";
	$timezone->value="4.5";
	$timezone->description="(GMT+04:30) Kabul";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="54";
	$timezone->gmtAdjustment="GMT+05:00";
	$timezone->useDaylightTime="1";
	$timezone->value="5";
	$timezone->description="(GMT+05:00) Yekaterinburg";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="55";
	$timezone->gmtAdjustment="GMT+05:00";
	$timezone->useDaylightTime="0";
	$timezone->value="5";
	$timezone->description="(GMT+05:00) Islamabad, Karachi, Tashkent";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="56";
	$timezone->gmtAdjustment="GMT+05:30";
	$timezone->useDaylightTime="0";
	$timezone->value="5.5";
	$timezone->description="(GMT+05:30) Sri Jayawardenapura";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="57";
	$timezone->gmtAdjustment="GMT+05:30";
	$timezone->useDaylightTime="0";
	$timezone->value="5.5";
	$timezone->description="(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="58";
	$timezone->gmtAdjustment="GMT+05:45";
	$timezone->useDaylightTime="0";
	$timezone->value="5.75";
	$timezone->description="(GMT+05:45) Kathmandu";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="59";
	$timezone->gmtAdjustment="GMT+06:00";
	$timezone->useDaylightTime="1";
	$timezone->value="6";
	$timezone->description="(GMT+06:00) Almaty, Novosibirsk";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="60";
	$timezone->gmtAdjustment="GMT+06:00";
	$timezone->useDaylightTime="0";
	$timezone->value="6";
	$timezone->description="(GMT+06:00) Astana, Dhaka";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="61";
	$timezone->gmtAdjustment="GMT+06:30";
	$timezone->useDaylightTime="0";
	$timezone->value="6.5";
	$timezone->description="(GMT+06:30) Yangon (Rangoon)";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="62";
	$timezone->gmtAdjustment="GMT+07:00";
	$timezone->useDaylightTime="0";
	$timezone->value="7";
	$timezone->description="(GMT+07:00) Bangkok, Hanoi, Jakarta";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="63";
	$timezone->gmtAdjustment="GMT+07:00";
	$timezone->useDaylightTime="1";
	$timezone->value="7";
	$timezone->description="(GMT+07:00) Krasnoyarsk";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="64";
	$timezone->gmtAdjustment="GMT+08:00";
	$timezone->useDaylightTime="0";
	$timezone->value="8";
	$timezone->description="(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="65";
	$timezone->gmtAdjustment="GMT+08:00";
	$timezone->useDaylightTime="0";
	$timezone->value="8";
	$timezone->description="(GMT+08:00) Kuala Lumpur, Singapore";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="66";
	$timezone->gmtAdjustment="GMT+08:00";
	$timezone->useDaylightTime="0";
	$timezone->value="8";
	$timezone->description="(GMT+08:00) Irkutsk, Ulaan Bataar";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="67";
	$timezone->gmtAdjustment="GMT+08:00";
	$timezone->useDaylightTime="0";
	$timezone->value="8";
	$timezone->description="(GMT+08:00) Perth";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="68";
	$timezone->gmtAdjustment="GMT+08:00";
	$timezone->useDaylightTime="0";
	$timezone->value="8";
	$timezone->description="(GMT+08:00) Taipei";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="69";
	$timezone->gmtAdjustment="GMT+09:00";
	$timezone->useDaylightTime="0";
	$timezone->value="9";
	$timezone->description="(GMT+09:00) Osaka, Sapporo, Tokyo";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="70";
	$timezone->gmtAdjustment="GMT+09:00";
	$timezone->useDaylightTime="0";
	$timezone->value="9";
	$timezone->description="(GMT+09:00) Seoul";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="71";
	$timezone->gmtAdjustment="GMT+09:00";
	$timezone->useDaylightTime="1";
	$timezone->value="9";
	$timezone->description="(GMT+09:00) Yakutsk";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="72";
	$timezone->gmtAdjustment="GMT+09:30";
	$timezone->useDaylightTime="0";
	$timezone->value="9.5";
	$timezone->description="(GMT+09:30) Adelaide";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="73";
	$timezone->gmtAdjustment="GMT+09:30";
	$timezone->useDaylightTime="0";
	$timezone->value="9.5";
	$timezone->description="(GMT+09:30) Darwin";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="74";
	$timezone->gmtAdjustment="GMT+10:00";
	$timezone->useDaylightTime="0";
	$timezone->value="10";
	$timezone->description="(GMT+10:00) Brisbane";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="75";
	$timezone->gmtAdjustment="GMT+10:00";
	$timezone->useDaylightTime="1";
	$timezone->value="10";
	$timezone->description="(GMT+10:00) Canberra, Melbourne, Sydney";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="76";
	$timezone->gmtAdjustment="GMT+10:00";
	$timezone->useDaylightTime="1";
	$timezone->value="10";
	$timezone->description="(GMT+10:00) Hobart";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="77";
	$timezone->gmtAdjustment="GMT+10:00";
	$timezone->useDaylightTime="0";
	$timezone->value="10";
	$timezone->description="(GMT+10:00) Guam, Port Moresby";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="78";
	$timezone->gmtAdjustment="GMT+10:00";
	$timezone->useDaylightTime="1";
	$timezone->value="10";
	$timezone->description="(GMT+10:00) Vladivostok";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="79";
	$timezone->gmtAdjustment="GMT+11:00";
	$timezone->useDaylightTime="1";
	$timezone->value="11";
	$timezone->description="(GMT+11:00) Magadan, Solomon Is., New Caledonia";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="80";
	$timezone->gmtAdjustment="GMT+12:00";
	$timezone->useDaylightTime="1";
	$timezone->value="12";
	$timezone->description="(GMT+12:00) Auckland, Wellington";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="81";
	$timezone->gmtAdjustment="GMT+12:00";
	$timezone->useDaylightTime="0";
	$timezone->value="12";
	$timezone->description="(GMT+12:00) Fiji, Kamchatka, Marshall Is.";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	$timezone->timeZoneId="82";
	$timezone->gmtAdjustment="GMT+13:00";
	$timezone->useDaylightTime="0";
	$timezone->value="13";
	$timezone->description="(GMT+13:00) Nuku'alof";
	$timezonelist[] = $timezone;
	$timezone = new stdClass();

	return $timezonelist;
}

function gmt($format, $id){
	$timezones = timezones();
	$datetime = gmdate($format, time() + 3600*($timezones[$id-1]->value+$timezones[$id-1]->useDaylightTime));
	return $datetime;
}

function timezone($id){
	$timezones = timezones();
	return $timezones[$id-1]->description;
}